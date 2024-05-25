<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\{
    MedicalRecordController,
    ResponsibleController,
    BandController,
    UserController
};
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/user', [UserController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware(['verified'])->group(function () {
        Route::get('/user', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/responsible', [ResponsibleController::class, 'store']);
        Route::get('/responsibles/{id}', [ResponsibleController::class, 'showById']);
    Route::get('/responsibles', [ResponsibleController::class, 'show']);
        Route::put('/responsible/{id}', [ResponsibleController::class, 'update']);
        Route::post('/medicalRecord', [MedicalRecordController::class, 'store']);
        Route::get('/medicalRecord/{id}', [MedicalRecordController::class, 'showById']);
    Route::get('/medicalRecord', [MedicalRecordController::class, 'show']);
        Route::put('/medicalRecord/{id}', [MedicalRecordController::class, 'update']);
        Route::post('/band', [BandController::class, 'store']);
    Route::get('/band/{id}', [BandController::class, 'showById']);
    Route::get('/band', [BandController::class, 'show']);
    Route::put('/band/{id}', [BandController::class, 'update']);
});

    Route::get('/email/verify', function () {
        return response()->json([
            'message' => 'Email verification required'
        ], 403);
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return response()->json('ok', 200);
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return response()->json('Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');
});

