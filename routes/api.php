<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\User\AuthUserController;
use Illuminate\Support\Facades\Route;
Route::post('register', [AuthUserController::class, 'register']);
Route::post('login', [AuthUserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/book', [BookController::class, 'index']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy']);

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});
