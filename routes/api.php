<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponsibleController;
use App\Http\Controllers\MedicalRecordController;

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

Route::post('/responsible', [ResponsibleController::class, 'store']);
Route::get('/responsibles/{id}', [ResponsibleController::class, 'showById']);
Route::get('/responsibles', [ResponsibleController::class, 'show']);
Route::put('/responsible/{id}', [ResponsibleController::class, 'update']);
Route::post('/medicalRecord', [MedicalRecordController::class, 'store']);
Route::get('/medicalRecord/{id}', [MedicalRecordController::class, 'showById']);
Route::get('/medicalRecord', [MedicalRecordController::class, 'show']);
Route::put('/medicalRecord/{id}', [MedicalRecordController::class, 'update']);
Route::post('/user', [UserController::class, 'store']);

