<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Jadwal;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::all();
        return response()->json($dokter);
    }
    public function getJadwalByDokter($id)
    {
        try {
            $jadwal = Jadwal::where('id_dokter', $id)->get();

            if ($jadwal->isEmpty()) {
                return response()->json([
                    'success' => true,
                    'data' => [],
                    'message' => 'Tidak ada jadwal untuk dokter ini.'
                ]);
            }

            return response()->json([
                'success' => true,
                'data' => $jadwal
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
