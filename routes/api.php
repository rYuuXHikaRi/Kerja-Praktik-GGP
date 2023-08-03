<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\ArsipApiController;
use App\Http\Controllers\Api\LoginApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserApiController::class, 'index']);
Route::get('/arsips', [ArsipApiController::class, 'index']);
Route::post('/login', [LoginApiController::class, 'login']);
Route::get('/arsips/{id}', [ArsipApiController::class, 'show']);
Route::post('/arsips/store', [ArsipApiController::class, 'store']);
Route::put('/arsips/update/{id}', [ArsipApiController::class, 'update']);
Route::get('/files/{folderName}', function ($folderName) {
    $folderPath = "private/{$folderName}";
    $files = Storage::files($folderPath);
    
    return response()->json($files);
});
Route::get('/getfiles/{id}', [ArsipApiController::class, 'getFiles']);
Route::post('/addfiles/{id}', [ArsipApiController::class, 'addFiles']);
Route::get('/download/{filename}/{id}', [ArsipApiController::class, 'downloadFile'])->name('file.download');
Route::post('/arsips/store', [ArsipApiController::class, 'store']);
Route::post('/users/store', [UserApiController::class, 'store']);
Route::delete('/users/destroy/{id}', [UserApiController::class, 'destroy']);

Route::post('/login', [LoginApiController::class, 'authenticate']);
// Route::middleware('auth:sanctum') -> get('/user', [UserApiController::class, 'getUserData']);
Route::get('/getHistory', [ArsipApiController::class, 'getHistory']);
Route::get('/users/profile/{id}', [UserApiController::class, 'viewprofile']);
Route::put('/users/profile/edit/{id}', [UserApiController::class, 'editprofile']);
