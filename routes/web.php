<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('home');

Route::middleware(['CheckAuth:guest'])->group(function () {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'do_register'])->name('do-register');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'do_login'])->name('do-login');
});

Route::middleware(['CheckAuth:auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');

    Route::get('/friend', [FriendController::class, 'index'])->name('friend');
    Route::get('/friend/request', [FriendController::class, 'friend_request'])->name('friend-request');
    Route::get('/friend/sent', [FriendController::class, 'sent_request'])->name('sent-request');
    Route::get('/friend/{id}', [FriendController::class, 'add_remove_friend'])->name('add-remove-friend');
    Route::get('/friend/approve/{id}', [FriendController::class, 'approve_friend'])->name('approve-friend');

    Route::get('/chat/{user_id}/{friend_id}', [ChatController::class, 'index'])->name('chat');
    Route::post('/chat', [ChatController::class, 'send_message'])->name('send-message');
});