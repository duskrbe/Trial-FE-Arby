<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 'kurikulum';

    protected $fillable = [
        'prodi_id',
        'nama',
        'deskripsi',
    ];

    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }

    public function mataKuliah()
    {
        return $this->belongsToMany(MataKuliah::class, 'kurikulum_mata_kuliah', 'kurikulum_id', 'mata_kuliah_id');
    }
}
