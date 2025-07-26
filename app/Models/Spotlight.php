<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spotlight extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

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

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }
}
