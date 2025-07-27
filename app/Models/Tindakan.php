<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    public $timestamps = false;
    protected $table = 'tindakan';
    protected $primaryKey = 'id_tindakan';
    protected $fillable = [
        'no_rm',
        'id_transaksi_rm',
        'id_dokter',
        'jenis_tindakan',
        'id_obat',
        'id_jadwal',
        'id_poli'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'no_rm', 'no_rm');
    }

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'id_transaksi_rm', 'id_transaksi_rm');
    }


    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id_poli');
    }
}

