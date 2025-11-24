<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('guests', function (Blueprint $table) {
            // Mengubah kolom 'phone' menjadi nullable
            $table->string('phone', 20)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('guests', function (Blueprint $table) {
            // Mengembalikan kolom 'phone' menjadi NOT NULL
            $table->string('phone', 20)->nullable(false)->change();
        });
    }
};