<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;
    
    protected $table = 'penelitian';

    protected $fillable = [
        'judul',
        'tahun',
        'penulis',
        'link',
        'gambar_publikasi',
        'prodi_id',
    ];

    // Relasi ke Program Studi
    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }
}
