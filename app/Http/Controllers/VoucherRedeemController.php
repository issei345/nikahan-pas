<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VoucherRedeemController extends Controller
{
    /**
     * Menerima kode voucher, memvalidasi, dan menukarkannya.
     */
    public function redeem(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $code = $request->code;
        $staffId = Auth::id(); // ID Staf/User yang sedang login

        Log::info("Attempting to redeem voucher: {$code} by User ID: {$staffId}");

        // 1. Cari voucher
        // Di sini kita TIDAK perlu mengambil relasi guest dulu, 
        // karena tipe hadiah akan disimpan di voucher itu sendiri.
        $voucher = Voucher::where('code', $code)->first();

        // 2. Cek 1: Tidak Ditemukan
        if (!$voucher) {
            Log::warning("Voucher redeem failed: {$code} (Not Found)");
            return response()->json(['error' => 'Voucher tidak ditemukan.'], 404);
        }

        // 3. Cek 2: Sudah Digunakan
        // Jika voucher sudah memiliki tipe hadiah (prize_type), berarti sudah pernah di-redeem.
        if ($voucher->status === 'used' || $voucher->prize_type) {
             // Muat relasi guest hanya jika diperlukan untuk pesan error.
            if (!$voucher->relationLoaded('guest')) {
                $voucher->load('guest');
            }
            Log::warning("Voucher redeem failed: {$code} (Already Used)");
            return response()->json([
                'error' => "Voucher sudah digunakan pada {$voucher->used_at} oleh tamu {$voucher->guest->name}."
            ], 422); // Unprocessable Entity
        }

        // 4. Proses Penukaran (Sukses)
        try {
            // === LOGIKA BARU: MENENTUKAN HADIAH ACAK ===
            $prizeType = $this->determineRandomPrize();
            // ============================================

            $voucher->status = 'used';
            $voucher->used_at = now();
            $voucher->redeemed_by = $staffId;
            $voucher->prize_type = $prizeType; // Simpan tipe hadiah ke database
            $voucher->save();
            
            // Muat relasi guest untuk pesan sukses
            if (!$voucher->relationLoaded('guest')) {
                $voucher->load('guest');
            }

            $message = $this->generateRedeemMessage($prizeType, $voucher->guest->name);

            Log::info("Voucher redeem SUCCESS: {$code}. Prize: {$prizeType} for guest {$voucher->guest->name}");
            
            return response()->json([
                'message' => $message,
                'prize_type' => $prizeType, // Kirim tipe hadiah kembali ke frontend
                'guest_name' => $voucher->guest->name
            ], 200);

        } catch (\Exception $e) {
            Log::error("Voucher redeem ERROR on save: {$code} - " . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan server saat menyimpan data.'], 500);
        }
    }

    /**
     * Logika untuk menentukan hadiah acak.
     * Peluang: Buy 1 Get 1 (5% jika angka > 95), Diskon 10% (95% jika angka <= 95)
     * @return string
     */
    protected function determineRandomPrize(): string
    {
        // Ambil angka acak dari 1 sampai 100
        $randomNumber = rand(1, 100);

        // Peluang 5% untuk Buy 1 Get 1 (angka 96, 97, 98, 99, 100)
        if ($randomNumber > 95) {
            return 'BUY_1_GET_1'; 
        } 
        
        // Sisanya 95% peluang untuk Diskon 10% (angka 1 sampai 95)
        return 'DISCOUNT_10_PERCENT'; 
    }

    /**
     * Membuat pesan yang sesuai dengan tipe hadiah.
     * @param string $prizeType
     * @param string $guestName
     * @return string
     */
    protected function generateRedeemMessage(string $prizeType, string $guestName): string
    {
        $baseMessage = "Voucher BERHASIL ditukar untuk Tamu: {$guestName}. ";

        switch ($prizeType) {
            case 'DISCOUNT_10_PERCENT':
                return $baseMessage . "Hadiah: VOUCHER DISKON 10%!";
            case 'BUY_1_GET_1':
                return $baseMessage . "Hadiah: VOUCHER BUY 1 GET 1!";
            default:
                return $baseMessage . "Hadiah tidak teridentifikasi.";
        }
    }
}