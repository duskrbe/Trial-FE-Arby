<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fasilitas extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $table = 'fasilitas';

    protected $fillable = [
        'nama',
        'foto',
        'deskripsi',
        'prodi_id',
    ];

    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }
    
}
