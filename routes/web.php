<?php

use App\Http\Controllers\RsvpController;
// Hapus `VoucherScanController` jika Anda hanya menggunakan closure sederhana
// Hapus `VoucherRedeemController` dari import ini jika sudah di dalam closure Route::middleware
// use App\Http\Controllers\VoucherScanController;
use App\Http\Controllers\VoucherRedeemController;
use Illuminate\Support\Facades\Route;

// --- 1. RUTE UMUM (NON-AUTH) ---

Route::get('/', function () {
    return view('cover');
})->name('COVER');

Route::get('/undangan', function () {
    return view('undangan'); // Ganti 'undangan' dengan nama view halaman undangan Anda
})->name('undangan');

// Halaman RSVP untuk Tamu
Route::get('/rsvp', [RsvpController::class, 'index'])->name('rsvp.index');
Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');

// --- 2. RUTE AUTHENTIKASI ---

// Rute Autentikasi Bawaan Breeze (biarkan di sini)
require __DIR__.'/auth.php';


// --- 3. RUTE ADMIN/STAF (MEMBUTUHKAN LOGIN) ---

Route::middleware(['auth'])->group(function () {

    // Dashboard (Rute default setelah login)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Halaman Scanner Voucher
    // Memanggil view 'admin.scan'
    Route::get('/admin/voucher/scan', function () {
        return view('admin.scan');
    })->name('voucher.scan');

    // Rute API Endpoint untuk memvalidasi QR Code (Dipanggil oleh Fetch API)
    // URL yang dihasilkan: /admin/voucher/redeem (sesuai URL Fetch di JavaScript)
    // Menggunakan Controller yang Anda kirimkan (VoucherRedeemController)
    Route::post('/admin/voucher/redeem', [VoucherRedeemController::class, 'redeem'])
        ->name('voucher.redeem');

    // Rute '/admin' yang mengarah ke scanner
    Route::get('/admin', function () {
        return redirect()->route('voucher.scan');
    })->name('admin');

});