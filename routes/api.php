<?php

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

Route::post('/register', [ResponsibleController::class, 'register']);
Route::put('/responsible/{id}', [ResponsibleController::class, 'update']);

Route::post('/register', [MedicalRecordController::class, 'register']);
Route::put('/medicalRecord/{id}', [MedicalRecordController::class, 'update']);
