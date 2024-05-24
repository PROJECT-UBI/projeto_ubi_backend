<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\{
    MedicalRecordController,
    ResponsibleController,
    BandController,
    UserController
};
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/responsible', [ResponsibleController::class, 'store']);
    Route::get('/responsibles/{id}', [ResponsibleController::class, 'show']);
    Route::put('/responsible/{id}', [ResponsibleController::class, 'update']);
    Route::post('/medicalRecord', [MedicalRecordController::class, 'store']);
    Route::get('/medicalRecord/{id}', [MedicalRecordController::class, 'show']);
    Route::put('/medicalRecord/{id}', [MedicalRecordController::class, 'update']);
    Route::post('/band', [BandController::class, 'store']);
    Route::get('/band/{id}', [BandController::class, 'showById']);
    Route::get('/band', [BandController::class, 'show']);
    Route::put('/band/{id}', [BandController::class, 'update']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/user', [UserController::class, 'store']);
