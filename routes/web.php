<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TindakanController;

Route::get('/', function () {
    return redirect('/tindakan');
});

Route::get('/tindakan', [TindakanController::class, 'daftar'])->name('tindakan.daftar');

// Route::get('/riwayat-pasien', function () {
//     $riwayatList = []; // data yang kamu mau kirim ke view
//     return view('welcome', compact('riwayatList'));
// });

// Route::get('/form-tindakan', function () {
//     return view('tindakan.form');
// });

// Update this route to point to the correct method