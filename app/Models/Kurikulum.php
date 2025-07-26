<?php

namespace App\Models;

use App\Models\MataKuliah;
use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kurikulum extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $table = 'kurikulum';

    protected $fillable = [
        'prodi_id',
        'nama',
        'deskripsi',
    ];

    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }

    public function mataKuliah()
    {
        return $this->belongsToMany(MataKuliah::class, 'kurikulum_mata_kuliah', 'kurikulum_id', 'mata_kuliah_id');
    }
}
