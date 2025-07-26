<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penelitian extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;
    
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
