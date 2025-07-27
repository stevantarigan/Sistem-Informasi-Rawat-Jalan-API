<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TindakanController;
use App\Http\Controllers\Api\TransaksiRMController;
use App\Http\Controllers\Api\PasienController;
use App\Http\Controllers\Api\DokterController;
use App\Http\Controllers\Api\ObatController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\PoliController;



// Rute API Tindakan
Route::get('/tindakan', [TindakanController::class, 'apiDaftar']);
Route::get('/tindakan/{id}', [TindakanController::class, 'detail']);
Route::post('/tindakan', [TindakanController::class, 'tambah']);
Route::put('/tindakan/{id}', [TindakanController::class, 'edit']);
Route::delete('/tindakan/{id}', [TindakanController::class, 'hapus']);

// Rute API Pasien
Route::get('/pasien', [PasienController::class, 'index']);
// Rute API Dokter
Route::get('/dokter', [DokterController::class, 'index']);
// Rute API Obat
Route::get('/obat', [ObatController::class, 'index']);
// Rute API Poli
Route::get('/poli', [PoliController::class, 'index']);
// Rute API Jadwal
Route::get('/jadwal', [JadwalController::class, 'index']);
Route::get('/jadwal/by-dokter/{id}', [DokterController::class, 'getJadwalByDokter']);
//diagnosa
Route::post('/tambahDiagnosa', [TransaksiRMController::class, 'store']);
Route::get('/pasien-rekam-medis', [TransaksiRMController::class, 'getPasienAktif']);
// Rute API Rekam Medis
Route::get('/transaksi-rm', [TransaksiRMController::class, 'index']);
Route::get('/transaksi-rm-by-no-rm/{no_rm}', [TransaksiRMController::class, 'getByNoRM']);






// user
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// use App\Http\Controllers\Api\RiwayatController;
// Route::get('/poli', function() {
//     return \App\Models\Poli::select('id_poli', 'nama_poli')->get();
// });
// Route::get('/obat', function() {
//     return \App\Models\Obat::select('id_obat', 'nama_obat')->get();
// });
// Route::get('/dokter', function() {
//     return \App\Models\Dokter::select('id_dokter', 'nama_dokter','spesialis')->get();
// });
// Route::get('/pasien', function() {
//     return \App\Models\Pasien::select('no_rm', 'nama_pasien')->get();
// });
// Route::get('/riwayat', [RiwayatController::class, 'index']);
// Route::get('/pasienAll', [PasienController::class, 'index']);
// Route::get('/riwayat-pasien', [RiwayatController::class, 'index']);