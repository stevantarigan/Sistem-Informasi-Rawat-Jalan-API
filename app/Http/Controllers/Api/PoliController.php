<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Poli;

class PoliController extends Controller
{
    public function index()
    {
        $poli = Poli::all();
        return response()->json($poli);
    }
}
