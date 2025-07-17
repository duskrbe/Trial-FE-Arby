<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';

    // protected $primaryKey = 'ProdiID'; // Tell Laravel to use ProdiID as the PK

    // public $incrementing = false; // If ProdiID is not auto-incrementing
    // protected $keyType = 'string'; // Change to 'int' if ProdiID is numeric

    protected $fillable = [
        'nama',
        'foto',
        'tahun_berdiri',
        'deskripsi',
    ];

        /**
     * Relasi: Satu ProgramStudi punya banyak BannerProdi
     */
    public function bannerProdis()
    {
        return $this->hasMany(BannerProdi::class, 'prodi_id');
    }

    public function akreditasi()
    {
        return $this->hasMany(Akreditasi::class, 'prodi_id');
    }
    
    public function prospek_karir()
    {
        return $this->hasMany(ProspekKarir::class, 'prodi_id');
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class, 'prodi_id');
    }
}
