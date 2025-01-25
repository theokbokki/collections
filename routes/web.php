<?php

use App\Http\Controllers\StoreRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreLoginController;

Route::view('/', 'home')->name('home');

Route::middleware('guest')->group(function () {
    Route::view('/login', 'login')->name('login');
    Route::post('/login', StoreLoginController::class)->name('login.store');

    Route::view('/register', 'register')->name('register');
    Route::post('/register', StoreRegisterController::class)->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});
