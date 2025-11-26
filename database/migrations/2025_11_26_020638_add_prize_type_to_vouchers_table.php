<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {
            // Menambahkan kolom prize_type untuk menyimpan jenis hadiah (misalnya 'DISCOUNT_10_PERCENT')
            // Kolom ini nullable agar data lama tetap valid.
            $table->string('prize_type')->nullable()->after('redeemed_by'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {
            // Menghapus kolom prize_type jika migration di-rollback
            $table->dropColumn('prize_type');
        });
    }
};