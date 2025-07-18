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
        Schema::create('kurikulum_mata_kuliah', function (Blueprint $table) {
            $table->foreignId('kurikulum_id')->constrained('kurikulum','id')->onDelete('cascade');
            $table->foreignId('mata_kuliah_id')->constrained('mata_kuliah','id')->onDelete('cascade');
            $table->primary(['kurikulum_id', 'mata_kuliah_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulum_mata_kuliah');
    }
};
