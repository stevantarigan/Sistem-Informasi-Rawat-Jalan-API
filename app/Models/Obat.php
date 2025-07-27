<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'id_obat';
    protected $fillable = ['nama_obat', 'dosis', 'aturan_pakai', 'jenis', 'harga', 'merk'];

    public function transaksiObat()
    {
        return $this->hasMany(TransaksiObat::class, 'id_obat', 'id_obat');
    }

    public function tindakan()
    {
        return $this->hasMany(Tindakan::class, 'id_obat', 'id_obat');
    }
}

