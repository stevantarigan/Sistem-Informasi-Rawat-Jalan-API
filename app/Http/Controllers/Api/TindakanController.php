<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tindakan;

class TindakanController extends Controller
{
    public function index()
    {
        // Ambil semua data tindakan, sertakan nama pasien
        $tindakans = Tindakan::with('pasien')->get();

        // Format data sesuai kebutuhan
        $data = $tindakans->map(function ($tindakan) {
            return [
                'id_tindakan' => $tindakan->id_tindakan,
                'no_rm' => $tindakan->no_rm,
                'nama_pasien' => $tindakan->pasien ? $tindakan->pasien->nama_pasien : null,
                'jenis_tindakan' => $tindakan->jenis_tindakan,
                'id_dokter' => $tindakan->id_dokter,
                'id_obat' => $tindakan->id_obat,
                'id_jadwal' => $tindakan->id_jadwal,
                'id_poli' => $tindakan->id_poli,
            ];
        });

        return response()->json($data);
    }

    public function apiDaftar()
    {
        $tindakan = Tindakan::with(['pasien', 'rekamMedis', 'dokter', 'obat', 'jadwal', 'poli'])->get();
        return response()->json($tindakan);
    }

    public function daftar()
    {
        return view('daftarTindakan');
    }

    // Tambahan fungsi API

    public function detail($id)
    {
        $tindakan = Tindakan::with(['pasien', 'rekamMedis', 'dokter', 'obat', 'poli', 'jadwal'])->find($id);

        if (!$tindakan) {
            return response()->json([
                'success' => false,
                'message' => 'Tindakan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id_tindakan' => $tindakan->id_tindakan,
                'no_rm' => $tindakan->no_rm . ' - ' . ($tindakan->rekamMedis->pasien->nama_pasien ?? 'Tidak ditemukan'),
                'id_transaksi_rm' => $tindakan->id_transaksi_rm . ' - ' . ($tindakan->rekamMedis->diagnosa ?? 'Tidak ditemukan'),
                'jenis_tindakan' => $tindakan->jenis_tindakan,
                'id_dokter' => $tindakan->id_dokter . ' - ' . ($tindakan->dokter->nama_dokter ?? 'Tidak ditemukan'),
                'id_obat' => $tindakan->id_obat . ' - ' . ($tindakan->obat->nama_obat ?? 'Tidak ditemukan'),
                'id_jadwal' => $tindakan->id_jadwal . ' -'.' (' .
                    ($tindakan->jadwal->jam_masuk ?? '-') . ' - ' .
                    ($tindakan->jadwal->jam_keluar ?? '-') . ')',
                'id_poli' => $tindakan->id_poli . ' - ' . ($tindakan->poli->nama_poli ?? 'Tidak ditemukan'),
            ]
        ]);
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'no_rm' => 'required|exists:pasien,no_rm',
            'jenis_tindakan' => 'required|string',
            'id_dokter' => 'required|exists:dokter,id_dokter',
            'id_jadwal' => 'required|exists:jadwal,id_jadwal',
            'id_obat' => 'nullable|exists:obat,id_obat',
            'id_poli' => 'nullable|exists:poli,id_poli',
            'diagnosa' => 'nullable|string',
            'status_obat' => 'nullable|string',
            'id_transaksi_rm' => 'nullable|exists:rekam_medis,id_transaksi_rm'
        ]);

        // Validasi tambahan: pastikan jadwal cocok dengan dokter
        $jadwalValid = \App\Models\Jadwal::where('id_jadwal', $request->id_jadwal)
            ->where('id_dokter', $request->id_dokter)
            ->exists();

        if (!$jadwalValid) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal tidak sesuai dengan dokter yang dipilih.'
            ], 422);
        }

        // Simpan tindakan
        $tindakan = Tindakan::create([
            'no_rm' => $request->no_rm,
            'jenis_tindakan' => $request->jenis_tindakan,
            'id_dokter' => $request->id_dokter,
            'id_jadwal' => $request->id_jadwal,
            'id_obat' => $request->id_obat,
            'id_poli' => $request->id_poli,
            'diagnosa' => $request->diagnosa,
            'status_obat' => $request->status_obat,
            'id_transaksi_rm' => $request->id_transaksi_rm
        ]);

        $tindakan->load(['pasien', 'dokter', 'obat', 'poli', 'jadwal']);

        return response()->json([
            'success' => true,
            'message' => 'Tindakan berhasil ditambahkan',
            'data' => $tindakan
        ]);
    }


    public function edit(Request $request, $id)
    {
        $tindakan = Tindakan::find($id);

        if (!$tindakan) {
            return response()->json([
                'success' => false,
                'message' => 'Tindakan tidak ditemukan'
            ], 404);
        }

        // Validasi hanya jenis_tindakan yang boleh diubah
        $request->validate([
            'jenis_tindakan' => 'required|string'
        ]);

        // Update hanya jenis_tindakan
        $tindakan->update([
            'jenis_tindakan' => $request->jenis_tindakan
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Jenis tindakan berhasil diperbarui',
            'data' => $tindakan
        ]);
    }

    public function hapus($id)
    {
        $tindakan = Tindakan::find($id);

        if (!$tindakan) {
            return response()->json([
                'success' => false,
                'message' => 'Tindakan tidak ditemukan'
            ], 404);
        }

        $tindakan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tindakan berhasil dihapus'
        ]);
    }
}
