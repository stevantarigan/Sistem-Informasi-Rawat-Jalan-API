<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::all(); // langsung array koleksi model
        return response()->json($pasien);
    }
}
