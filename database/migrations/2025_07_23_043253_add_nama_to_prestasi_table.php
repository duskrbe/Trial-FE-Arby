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
            Schema::table('prestasi', function (Blueprint $table) {
                $table->string('nama', 255)->after('id'); // sesuaikan posisi jika perlu
            });
        }

        public function down(): void
        {
            Schema::table('prestasi', function (Blueprint $table) {
                $table->dropColumn('nama');
            });
        }
};
