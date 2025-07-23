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
        Schema::table('banner_prodi', function (Blueprint $table) {
            $table->softDeletes(); // Tambah kolom deleted_at
        });
    }

    public function down(): void
    {
        Schema::table('banner_prodi', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }

};
