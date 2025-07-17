<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerProdi extends Model
{
    use HasFactory;

    protected $table = 'banner_prodi';

    protected $fillable = [
        'judul',
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
