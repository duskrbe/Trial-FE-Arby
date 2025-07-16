<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';

    protected $primaryKey = 'ProdiID'; // Tell Laravel to use ProdiID as the PK

    public $incrementing = false; // If ProdiID is not auto-incrementing
    protected $keyType = 'string'; // Change to 'int' if ProdiID is numeric

    protected $fillable = [
        'ProdiID',
        'Nama',
        'Foto',
        'Tahun_Berdiri',
        'Deskripsi',
    ];
}
