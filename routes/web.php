<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('home');

Route::middleware(['CheckAuth:guest'])->group(function () {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'do_register'])->name('do-register');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'do_login'])->name('do-login');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware(['CheckAuth:auth'])->group(function () {
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
});