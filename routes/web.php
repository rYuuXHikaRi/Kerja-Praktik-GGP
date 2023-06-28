<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArsipController;
use App\Models\Arsip;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('Login');
});

Route::get('/Dashboard', function () {
    return view('Dashboard');
});

Route::get('/TambahAkun', function () {
    return view('TambahAkun');
});

Route::resource('arsip', ArsipController::class);

// Route::get('/KelolaArsip', [ArsipController::class ,'create'] )->name('KelolaArsip');
// Route::post('/KelolaArsip', [ArsipController::class ,'store'])->name('TambahArsip');

Route::get('/DataPetugas', function () {
    return view('DataPetugas');
});

Route::get('/DataUser', function () {
    return view('DataUser');
});

Route::get('/RiwayatUnduhan', function () {
    return view('RiwayatUnduhan');
});

Route::get('/LihatDokumen', function () {
    return view('LihatDokumen');
});

Route::get('/Folder', [ArsipController::class ,'index'] )->name('TampilArsips');

