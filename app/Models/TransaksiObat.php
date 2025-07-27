<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiObat extends Model
{
    protected $table = 'transaksi_obat';
    protected $primaryKey = 'id_transaksi_obat';
    protected $fillable = ['id_transaksi_rm', 'no_rm', 'id_obat', 'id_dokter', 'jumlah', 'tgl_terima'];

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'id_transaksi_rm', 'id_transaksi_rm');
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'no_rm', 'no_rm');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }
}

