<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    public function index()
    {
        $sql = "
            SELECT 
                rm.id_transaksi_rm,
                p.no_rm,
                p.nama_pasien,
                d.nama_dokter,
                pl.nama_poli,
                rm.tanggal_kejadian,
                rm.diagnosa,
                rm.status_obat,
                GROUP_CONCAT(DISTINCT o.nama_obat SEPARATOR ', ') AS obat_diberikan,
                COUNT(DISTINCT tobat.id_obat) AS jumlah_obat,
                SUM(tobat.jumlah * o.harga) AS total_harga
            FROM rekam_medis rm
            JOIN pasien p ON rm.no_rm = p.no_rm
            LEFT JOIN dokter d ON rm.id_dokter = d.id_dokter
            LEFT JOIN poli pl ON rm.id_poli = pl.id_poli
            LEFT JOIN transaksi_obat tobat ON rm.id_transaksi_rm = tobat.id_transaksi_rm
            LEFT JOIN obat o ON tobat.id_obat = o.id_obat
            GROUP BY rm.id_transaksi_rm, p.no_rm, p.nama_pasien, d.nama_dokter, pl.nama_poli, rm.tanggal_kejadian, rm.diagnosa, rm.status_obat
            ORDER BY rm.tanggal_kejadian ASC
            LIMIT 50
        ";

        try {
            $riwayatList = DB::select($sql);

            return response()->json([
                'status' => 'berhasil',
                'data' => $riwayatList
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'gagal',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
