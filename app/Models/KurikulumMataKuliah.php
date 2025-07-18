<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class KurikulumMataKuliah extends Pivot
{
    use HasFactory;

    protected $table = 'kurikulum_mata_kuliah';

    public $timestamps = false;

    protected $fillable = 
    [
        'kurikulum_id', 
        'mata_kuliah_id'
    ];
}
