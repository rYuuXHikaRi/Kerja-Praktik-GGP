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
Route::post('/store', [ArsipApiController::class, 'store']);
Route::get('/files/{folderName}', function ($folderName) {
    $folderPath = "private/{$folderName}";
    $files = Storage::files($folderPath);
    
    return response()->json($files);
});
Route::get('/getfiles/{id}', [ArsipApiController::class, 'getFiles']);
Route::get('/download/{filename}/{id}', [ArsipApiController::class, 'downloadFile'])->name('file.download');
