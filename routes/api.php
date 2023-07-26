<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::post('/users/store', [UserApiController::class, 'store']);
Route::delete('/users/destroy/{id}', [UserApiController::class, 'destroy']);

