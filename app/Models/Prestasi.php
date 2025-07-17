<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';

    protected $fillable = [
        'foto',
        'deskripsi',
        'prodi_id',
    ];

    // Relasi ke Program Studi
    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }
}

