<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spotlight extends Model
{
    use HasFactory;

    protected $table = 'spotlight';

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'tanggal',
        'foto',
        'banner',
        'prodi_id',
    ];

    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }
}
