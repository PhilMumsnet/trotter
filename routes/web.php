<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth as AuthControllers;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/user/{user:username}', App\Http\Controllers\ShowUserPageController::class)->middleware('auth')->name('userpage');

Route::get('login', [AuthControllers\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthControllers\LoginController::class, 'login']);

Route::post('logout', [AuthControllers\LoginController::class, 'logout'])->name('logout');

Route::get('register', [AuthControllers\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthControllers\RegisterController::class, 'register']);

Route::prefix('password')->name('password.')->group(function () {
    Route::get('reset', [AuthControllers\ForgotPasswordController::class, 'showLinkRequestForm'])->name('request');
    Route::post('email', [AuthControllers\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email');
    Route::get('reset/{token}', [AuthControllers\ResetPasswordController::class, 'showResetForm'])->name('reset');
    Route::post('reset', [AuthControllers\ResetPasswordController::class, 'reset'])->name('update');
    Route::get('confirm', [AuthControllers\ConfirmPasswordController::class, 'showConfirmForm'])->name('confirm');
    Route::post('confirm', [AuthControllers\ConfirmPasswordController::class, 'confirm']);
});

Route::prefix('email')->name('verification.')->group(function () {
    Route::get('verify', [AuthControllers\VerificationController::class, 'show'])->name('notice');
    Route::get('verify/{id}/{hash}', [AuthControllers\VerificationController::class, 'verify'])->name('verify');
    Route::post('resend', [AuthControllers\VerificationController::class, 'resend'])->name('resend');
});
