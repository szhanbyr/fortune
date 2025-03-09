<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\KycController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('landing'))->name('landing');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::post('/dashboard/spin', [RegisterController::class, 'spinBonus'])->name('dashboard.spin'); // New spin route
    Route::get('/deposit', [DepositController::class, 'show'])->name('deposit');
    Route::post('/deposit', [DepositController::class, 'store'])->name('deposit.post');
    Route::get('/withdraw', [WithdrawController::class, 'show'])->name('withdraw');
    Route::post('/withdraw', [WithdrawController::class, 'store'])->name('withdraw.post');
    Route::get('/kyc', [KycController::class, 'show'])->name('kyc');
    Route::post('/kyc', [KycController::class, 'store'])->name('kyc.post');
    Route::get('/license', fn() => view('license'))->name('license');
});