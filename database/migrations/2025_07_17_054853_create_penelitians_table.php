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
        Schema::create('penelitian', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->year('tahun');
            $table->string('penulis', 255);
            $table->string('link', 255)->nullable();
            $table->string('gambar_publikasi', 255)->nullable();
            $table->foreignId('prodi_id')->constrained('program_studi', 'id')->onDelete('cascade');
            $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penelitian');
    }
};
