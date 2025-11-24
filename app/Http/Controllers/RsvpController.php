<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Jobs\GenerateVoucherJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RsvpController extends Controller
{
    /**
     * Menampilkan form RSVP
     */
    public function index()
    {
        // Sesuaikan dengan nama view yang benar
        return view('undangan', ['#rsvp']);
    }

    /**
     * Menyimpan data RSVP
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            // Gunakan Rule::unique agar kita bisa mengabaikan case-sensitive
            'email' => [
                'required',
                'email',
                'max:255',
                // Pastikan email unik di tabel 'guests' (case-insensitive)
                Rule::unique('guests', 'email')->where(function ($query) use ($request) {
                    return $query->whereRaw('LOWER(email) = ?', [strtolower($request->email)]);
                }),
            ],
            'rsvp_status' => 'required|in:coming,not_coming',
        ]);

        if ($validator->fails()) {
            return redirect()->route('undangan',['#rsvp'])
                        ->withErrors($validator)
                        ->withInput();
        }

        // 2. Siapkan Data untuk Disimpan
        $data = $request->only(['name', 'rsvp_status']);
        
        // Konversi email ke huruf kecil (lowercase) untuk konsistensi database
        $data['email'] = strtolower($request->input('email'));
        
        // Solusi untuk Field 'phone' doesn't have a default value (Issue 1364).
        // Karena input 'phone' dihapus dari form, kita set nilainya secara eksplisit ke NULL
        // agar kolom NOT NULL di database tidak menolak request.
        $data['phone'] = null;

        // 3. Simpan data tamu
        // Pastikan Model Guest memiliki $fillable untuk 'name', 'email', 'rsvp_status', dan 'phone'
        $guest = Guest::create($data);

        // 4. Dispatch Job jika konfirmasi Hadir
        if ($guest->rsvp_status == 'coming') {
            // Dispatch job untuk membuat voucher, akan diproses oleh queue:work
            GenerateVoucherJob::dispatch($guest); 
        }

        // 5. Redirect dengan pesan sukses
        return redirect()->route('undangan',['#rsvp'])
                    ->with('success', 'Konfirmasi kehadiran Anda telah berhasil disimpan.'); 
    }
}