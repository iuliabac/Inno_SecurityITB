<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// Default welcome page
Route::get('/', function () {
    return view('welcome');
});

// Laravel auth routes (login, register, password reset, email verification)
Auth::routes();

// Home page after login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Dashboard page - protected by auth middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// About page (public)
Route::get('/about', function () {
    return view('about');
})->name('about');

/*
 * Password Reset Routes (optional if you want to customize)
 * Laravel's Auth::routes() already registers these:
 */

// Show "forgot password" form
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Send password reset link email
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');


// Show "reset password" form with token
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Handle the reset password form submission
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
