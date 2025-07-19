<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Import DB Facade

return new class extends Migration
{
    /**
     * Run the migrations.
     * Mengubah tipe kolom 'status' di tabel 'dosen' menjadi ENUM.
     */
    public function up(): void
    {
        // Mengubah tipe kolom 'status' menjadi ENUM dengan opsi 'Dosen Tidak Tetap' dan 'Dosen Tetap'
        // NULL DEFAULT NULL mempertahankan properti nullable dari kolom sebelumnya.
        DB::statement("ALTER TABLE `dosen` CHANGE `status` `status` ENUM('Dosen Tidak Tetap', 'Dosen Tetap') NULL DEFAULT NULL");
    }

    /**
     * Reverse the migrations.
     * Mengembalikan tipe kolom 'status' ke VARCHAR jika rollback.
     */
    public function down(): void
    {
        // Mengembalikan tipe kolom 'status' ke VARCHAR(255) jika rollback
        DB::statement("ALTER TABLE `dosen` CHANGE `status` `status` VARCHAR(255) NULL DEFAULT NULL");
    }
};
