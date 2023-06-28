<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

Route::get('/Dashboard', function () {
    return view('Dashboard');
});

Route::get('/TambahAkun', function () {
    return view('TambahAkun');
});

Route::get('/KelolaArsip', function () {
    return view('KelolaArsip');
});

Route::get('/DataPetugas', function () {
    return view('DataPetugas');
});

Route::get('/DataUser', function () {
    return view('DataUser');
});

Route::get('/RiwayatUnduhan', function () {
    return view('RiwayatUnduhan');
});

Route::get('/Folder', function () {
    return view('Folder');
});

Route::get('/LihatDokumen', function () {
    return view('LihatDokumen');
});