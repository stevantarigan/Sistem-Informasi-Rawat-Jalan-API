<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AntrianObat extends Model
{
    protected $table = 'antrian_obat';
    protected $primaryKey = 'id_antrian_obat';
    public $timestamps = false;
    protected $fillable = ['id_transaksi_obat', 'status_antrian', 'waktu'];

    public function transaksiObat()
    {
        return $this->belongsTo(TransaksiObat::class, 'id_transaksi_obat');
    }
}
