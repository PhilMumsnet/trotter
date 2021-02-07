<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::prefix('password')->name('password.')->group(function () {
    Route::get('reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('request');
    Route::post('email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email');
    Route::get('reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('reset');
    Route::post('reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('update');
    Route::get('confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('confirm');
    Route::post('confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);
});

Route::prefix('email')->name('verification.')->group(function () {
    Route::get('verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('notice');
    Route::get('verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verify');
    Route::post('resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('resend');
});
