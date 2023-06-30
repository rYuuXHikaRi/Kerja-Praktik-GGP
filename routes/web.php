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
    return view('Login'); // Change to login again
});

Route::get('/Dashboard', function () {
    return view('Dashboard');
});

Route::resource('user', UserController::class);
// Route::get('/user', [UserController::class, 'index'])->name('IndexUser');
// Route::get('/tambah-user', [UserController::class, 'create'])->name('CreateUser');
// Route::post('/store-user',[UserController::class,'store'])->name('StoreUser');
// Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('EditUser');
// Route::put('/update-user/{id}',[UserController::class,'update'])->name('UpdateUser');
// Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('DestroyUser');

// Route::get('/DataPetugas', function () {
//     return view('DataPetugas');
// });

// Route::get('/DataUser', function () {
//     return view('DataUser');
// });

// Route::get('/Folder', function () {
//     return view('Folder');
// });


// Route::get('/KelolaArsip', function () {
//     return view('KelolaArsip');
// });

Route::resource('arsip', ArsipController::class);

// Route::get('/KelolaArsip', [ArsipController::class ,'create'] )->name('KelolaArsip');
// Route::post('/KelolaArsip', [ArsipController::class ,'store'])->name('TambahArsip');



// Route::get('/LihatDokumen', function () {
//     return view('LihatDokumen');
// });

// Route::get('/Login', function () {
//     return view('Login');
// });

// Route::get('/Profil', function () {
//     return view('Profil');
// });

// Route::get('/RiwayatUnduhan', function () {
//     return view('RiwayatUnduhan');
// });

// Route::get('/TambahAkun', function () {
//     return view('TambahAkun');
// });

