<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'poli';
    protected $primaryKey = 'id_poli';
    protected $fillable = ['nama_poli'];

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class, 'id_poli', 'id_poli');
    }

    public function tindakan()
    {
        return $this->hasMany(Tindakan::class, 'id_poli', 'id_poli');
    }

    public function antrianPoli()
    {
        return $this->hasMany(AntrianPoli::class, 'id_poli', 'id_poli');
    }
}

