<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\Validator;
class TransaksiRMController extends Controller
{
    public function index()
    {
        $data = RekamMedis::all();
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_rm' => 'required|exists:pasien,no_rm',
            'id_dokter' => 'required|exists:dokter,id_dokter',
            'id_poli' => 'required|exists:poli,id_poli',
            'tanggal_kejadian' => 'required|date',
            'diagnosa' => 'required|string|max:255',
            'status_obat' => 'required|in:dibuat,diambil'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            RekamMedis::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Diagnosa berhasil disimpan!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Tambahkan method baru untuk get by no_rm
    public function getByNoRM($no_rm)
    {
        try {
            $transaksi = RekamMedis::where('no_rm', $no_rm)
                ->orderBy('tanggal_kejadian', 'desc')
                ->get(['id_transaksi_rm', 'diagnosa', 'tanggal_kejadian', 'no_rm']);

            return response()->json([
                'success' => true,
                'data' => $transaksi
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data transaksi RM',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function getPasienAktif()
    {
        $rekamMedis = RekamMedis::with('pasien')
            ->select('no_rm') // hanya ambil no_rm
            ->groupBy('no_rm') // hindari duplikat jika 1 pasien punya banyak RM
            ->get();

        $data = $rekamMedis->map(function ($rm) {
            return [
                'no_rm' => $rm->no_rm,
                'nama_pasien' => $rm->pasien->nama_pasien ?? 'Tidak ditemukan',
            ];
        });

        return response()->json($data);
    }
}