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
        Schema::create('spotlight', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->enum('kategori', ['Berita Terbaru', 'Acara Mendatang', 'Kegiatan Mahasiswa']);
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->string('foto', 255)->nullable();
            $table->string('banner', 255)->nullable();
            $table->foreignId('prodi_id')->constrained('program_studi','id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spotlight');
    }
};
