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
        Schema::create('program_studi', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('foto', 255)->nullable();
            $table->year('tahun_berdiri')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_program__studi');
    }
};
