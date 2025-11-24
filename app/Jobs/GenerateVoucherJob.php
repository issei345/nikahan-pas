<?php

namespace App\Jobs;

use App\Models\Guest;
use App\Models\Voucher;
use App\Mail\VoucherNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateVoucherJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $guest;

    /**
     * Create a new job instance.
     */
    public function __construct(Guest $guest)
    {
        $this->guest = $guest;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // 1. Cek apakah tamu sudah punya voucher
            if ($this->guest->voucher) {
                Log::info("Tamu {$this->guest->email} sudah memiliki voucher.");
                return;
            }

            // 2. Buat kode voucher unik
            $code = 'WEDD-VOUCHER-' . Str::upper(Str::random(10));

            // 3. Simpan voucher ke database
            $voucher = Voucher::create([
                'guest_id' => $this->guest->id,
                'code' => $code,
                'status' => 'unused',
            ]);

            // 4. Generate QR Code (sebagai data URI untuk email)
            $qrCodeData = QrCode::format('png')->size(300)->generate($voucher->code);
            $qrCodeBase64 = 'data:image/png;base64,' . base64_encode($qrCodeData);

            // 5. Kirim email voucher ke tamu
            Mail::to($this->guest->email)->send(
                new VoucherNotification($this->guest, $qrCodeBase64)
            );

            Log::info("Voucher {$code} berhasil dibuat untuk {$this->guest->email}.");

        } catch (\Exception $e) {
            Log::error("Gagal membuat voucher untuk {$this->guest->email}: " . $e->getMessage());
        }
    }
}
