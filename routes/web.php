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

Route::resource('user', UserController::class);
// Route::get('/user', [UserController::class, 'index'])->name('IndexUser');
// Route::get('/tambah-user', [UserController::class, 'create'])->name('CreateUser');
// Route::post('/store-user',[UserController::class,'store'])->name('StoreUser');
// Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('EditUser');
// Route::put('/update-user/{id}',[UserController::class,'update'])->name('UpdateUser');
// Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('DestroyUser');


Route::resource('arsip', ArsipController::class);

// Route::get('/KelolaArsip', [ArsipController::class ,'create'] )->name('KelolaArsip');
// Route::post('/KelolaArsip', [ArsipController::class ,'store'])->name('TambahArsip');





