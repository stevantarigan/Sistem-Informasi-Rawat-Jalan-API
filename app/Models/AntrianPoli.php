<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AntrianPoli extends Model
{
    protected $table = 'antrian_poli';
    public $timestamps = false; // Tidak ada kolom created_at & updated_at

    protected $fillable = ['no_rm', 'id_poli', 'status'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'no_rm', 'no_rm');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id_poli');
    }
}

