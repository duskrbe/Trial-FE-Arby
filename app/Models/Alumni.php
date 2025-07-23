<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumni extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $table = 'alumni';

    protected $fillable = [
        'nama',
        'foto',
        'tahun_lulus',
        'jabatan',
        'perusahaan',
    ];


    // Relasi ke Program Studi
    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }
}
