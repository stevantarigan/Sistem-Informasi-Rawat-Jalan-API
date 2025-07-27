<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = ['jam_masuk', 'jam_keluar', 'hari', 'id_dokter'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    public function tindakan()
    {
        return $this->hasMany(Tindakan::class, 'id_jadwal', 'id_jadwal');
    }
}

