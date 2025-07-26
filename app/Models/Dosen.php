<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dosen extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $table = 'dosen'; // Pastikan nama tabelnya benar

    protected $fillable = [
        'nidn',
        'nama',
        'foto',
        'status',
        'prodi_id',
    ];

    /**
     * Dapatkan Program Studi tempat dosen ini berafiliasi.
     */
    public function prodi()
    {
        // Relasi many-to-one: Dosen ini dimiliki oleh satu ProgramStudi
        // 'prodi_id' adalah foreign key di tabel 'dosen'
        // 'prodi_id' adalah primary key di tabel 'program_studi'
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }
}