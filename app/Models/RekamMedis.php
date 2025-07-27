<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{   
    
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id_transaksi_rm';

    
    protected $fillable = ['no_rm', 'id_dokter', 'tanggal_kejadian', 'diagnosa', 'status_obat', 'id_poli'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'no_rm', 'no_rm');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id_poli');
    }

    public function transaksiObat()
    {
        return $this->hasMany(TransaksiObat::class, 'id_transaksi_rm', 'id_transaksi_rm');
    }

    public function tindakan()
    {
        return $this->hasMany(Tindakan::class, 'id_transaksi_rm', 'id_transaksi_rm');
    }
}

