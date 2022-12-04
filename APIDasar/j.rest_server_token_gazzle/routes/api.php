<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('mahasiswa', MahasiswaController::class);

Route::get('mahasiswa', [MahasiswaController::class, 'index'])->middleware('auth:sanctum');
Route::get('mahasiswa/{id}', [MahasiswaController::class, 'show'])->middleware('auth:sanctum');

Route::post('mahasiswa', [MahasiswaController::class, 'store'])->middleware('auth:sanctum');

Route::put('mahasiswa', [MahasiswaController::class, 'update'])->middleware('auth:sanctum');

Route::delete('mahasiswa', [MahasiswaController::class, 'destroy'])->middleware('auth:sanctum');
