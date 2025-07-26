<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerProdi extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

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
