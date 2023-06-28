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

Route::get('/', function () {
    return view('Dashboard');
});

Route::resource('begalin', AdminBegalinController::class);
Route::get('/user', [UserController::class, 'index'])->name('IndexUser');
Route::get('/tambah-user', [UserController::class, 'create'])->name('CreateUser');
Route::post('/store-user',[UserController::class,'store'])->name('StoreUser');
Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('EditUser');
Route::put('/update-user/{id}',[UserController::class,'update'])->name('UpdateUser');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('DestroyUser');




