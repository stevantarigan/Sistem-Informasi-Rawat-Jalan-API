<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    protected $fillable = ['nama_dokter', 'spesialis', 'nomor_kontak', 'email'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_dokter', 'id_dokter');
    }

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class, 'id_dokter', 'id_dokter');
    }

    public function transaksiObat()
    {
        return $this->hasMany(TransaksiObat::class, 'id_dokter', 'id_dokter');
    }

    public function tindakan()
    {
        return $this->hasMany(Tindakan::class, 'id_dokter', 'id_dokter');
    }
}

