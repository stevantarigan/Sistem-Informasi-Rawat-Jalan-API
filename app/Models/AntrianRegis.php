<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AntrianRegis extends Model
{
    protected $table = 'antrian_regis';
    protected $primaryKey = 'no_daftar';
    public $timestamps = false;
    protected $fillable = ['status'];
}

