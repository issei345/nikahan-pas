<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest; // Ganti dengan model yang relevan, misalnya Voucher atau Guest
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VoucherController extends Controller
{
    /**
     * Memproses permintaan redeem voucher dari QR scanner.
     */
    public function redeem(Request $request)
    {
        // Pastikan kita mendapatkan kode dari request JSON
        $code = $request->json('code'); 

        if (empty($code)) {
            return response()->json(['error' => 'Kode voucher tidak ditemukan.'], 400);
        }

        try {
            // 1. Cari Tamu/Voucher berdasarkan kode unik
            $guest = Guest::where('voucher_code', $code)->first();

            if (!$guest) {
                // Jika kode tidak ditemukan
                return response()->json(['error' => 'QR Code tidak valid atau tidak terdaftar!'], 404);
            }

            // 2. Cek apakah voucher sudah digunakan
            if ($guest->is_redeemed) {
                // Jika sudah pernah digunakan
                return response()->json(['error' => 'Voucher sudah digunakan oleh ' . $guest->name . '!'], 409);
            }
            
            // 3. Update Status Voucher (Proses Redeem Sukses)
            $guest->is_redeemed = true;
            $guest->redeemed_at = now();
            $guest->redeemed_by_user_id = auth()->id(); // Opsional: catat siapa yang me-redeem
            $guest->save();

            // 4. Beri respons sukses
            $message = "Redeem Sukses! Voucher milik: **{$guest->name}** ({$guest->email})";

            return response()->json(['message' => $message], 200);

        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Voucher Redeem Error: ' . $e->getMessage());
            
            return response()->json(['error' => 'Terjadi kesalahan sistem saat memproses voucher.'], 500);
        }
    }
}