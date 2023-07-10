<?php

use App\Models\Arsip;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserArsipController;

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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth');
Route::get('/', [LoginController::class, 'logout'])->name('logout');




Route::middleware(['role:1'])->group(function () {

    
    Route::get('/dashboardadmin', [DashboardController::class, 'adminindex'])->name('admindashboard'); 
    Route::resource('user', UserController::class);
    Route::get('/showuser', [UserController::class, 'showuser'])->name('showuser');
// Route::get('/Dashboard', [UserController::class, 'showCountDashboard'])->name('ShowCountDashboard');
    Route::put('/Profil/{id}', [UserController::class, 'adminEditProfile'])->name('adminEditProfile');
    Route::get('/Profil', [UserController::class, 'adminShowProfile'])->name('adminShowProfile');

    Route::resource('archive', ArsipController::class);
    Route::get('/lihat-file/{file}/{id}', [ArsipController::class, 'view'])->name('admin.view.arsip');
    Route::post('/tambah-file/{id}', [ArsipController::class, 'addFile'])->name('admin.add.arsip');
    Route::delete('/hapus-file/{file}/{id}', [ArsipController::class, 'deleteFile'])->name('admin.delete.arsip');
    // Route::get('/private-files/download/{file}', [PrivateFileController::class, 'download'])->name('private-files.download');
    // Route::get('/private-files/view/{file}', [PrivateFileController::class, 'view'])->name('private-files.view');


    Route::resource('history', HistoryController::class);
});


Route::middleware(['role:2'])->group(function () {

    
    Route::get('/dashboarduser', [DashboardController::class, 'userindex'])->name('userdashboard'); 
// Route::get('/Dashboard', [UserController::class, 'showCountDashboard'])->name('ShowCountDashboard');
    Route::put('/Profile/{id}', [UserController::class, 'EditProfile'])->name('EditProfile');
    Route::get('/Profile', [UserController::class, 'ShowProfile'])->name('ShowProfile');

    Route::resource('arsip', UserArsipController::class);
    Route::get('/view-file/{file}/{id}', [UserArsipController::class, 'view'])->name('view.arsip');
    Route::post('/add-file/{id}', [UserArsipController::class, 'addFile'])->name('add.arsip');
    Route::delete('/delete-file/{file}/{id}', [UserArsipController::class, 'deleteFile'])->name('delete.arsip');
    // Route::get('/private-files/download/{file}', [PrivateFileController::class, 'download'])->name('private-files.download');
    // Route::get('/private-files/view/{file}', [PrivateFileController::class, 'view'])->name('private-files.view');

});





// Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard');




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






// Route::get('/KelolaArsip', [ArsipController::class ,'create'] )->name('KelolaArsip');
// Route::post('/KelolaArsip', [ArsipController::class ,'store'])->name('TambahArsip');




// Route::get('/TambahAkun', function () {
//     return view('TambahAkun');
// });

