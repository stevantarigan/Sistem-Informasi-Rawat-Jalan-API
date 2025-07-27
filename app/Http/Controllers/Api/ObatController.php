<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        return response()->json($obat);
    }
}
