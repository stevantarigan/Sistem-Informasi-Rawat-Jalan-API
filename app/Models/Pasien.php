<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'no_rm';
    public $incrementing = false;
    protected $fillable = [
        'no_rm',
        'nama_pasien',
        'alamat',
        'no_telp',
        'gender',
        'tempat_lahir',
        'tgl_lahir',
        'contact_person',
        'status_cp'
    ];

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class, 'no_rm', 'no_rm');
    }

    public function transaksiObat()
    {
        return $this->hasMany(TransaksiObat::class, 'no_rm', 'no_rm');
    }

    public function tindakan()
    {
        return $this->hasMany(Tindakan::class, 'no_rm', 'no_rm');
    }

    public function antrianPoli()
    {
        return $this->hasMany(AntrianPoli::class, 'no_rm', 'no_rm');
    }

    public function antrianObat()
    {
        return $this->hasMany(AntrianObat::class, 'no_rm', 'no_rm');
    }
}
