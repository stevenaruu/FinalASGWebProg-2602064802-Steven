<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('home');

Route::middleware(['CheckAuth:guest'])->group(function () {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'do_register'])->name('do-register');

    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'do_login'])->name('do-login');

    Route::get('/payment', [PaymentController::class, 'show_payment_page'])->name('payment-show');
    Route::post('/payment', [PaymentController::class, 'process_payment'])->name('payment-process');

    Route::post('/payment-overpaid', [PaymentController::class, 'handle_overpaid'])->name('payment-overpaid');
});

Route::middleware(['CheckAuth:auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile', [UserController::class, 'user_profile'])->name('user_profile');

    Route::get('/friend', [FriendController::class, 'index'])->name('friend');
    Route::get('/friend/request', [FriendController::class, 'friend_request'])->name('friend-request');
    Route::get('/friend/sent', [FriendController::class, 'sent_request'])->name('sent-request');
    Route::get('/friend/{id}', [FriendController::class, 'add_remove_friend'])->name('add-remove-friend');
    Route::get('/friend/approve/{id}', [FriendController::class, 'approve_friend'])->name('approve-friend');

    Route::get('/chat/{user_id}/{friend_id}', [ChatController::class, 'index'])->name('chat');
    Route::post('/chat', [ChatController::class, 'send_message'])->name('send-message');

    Route::post('/settings/invisible', [UserController::class, 'make_invisible'])->name('make-invisible');
    Route::post('/settings/visible', [UserController::class, 'make_visible'])->name('make-visible');

    Route::get('/top-up', [PaymentController::class, 'top_up'])->name('top-up');
    Route::post('/top-up', [PaymentController::class, 'do_top_up'])->name('do-top-up');

    Route::get('/avatar', [AvatarController::class, 'index'])->name('avatar');
    Route::get('/avatar/my-avatar', [AvatarController::class, 'my_avatar'])->name('my-avatar');
    Route::post('/avatar', [AvatarController::class, 'buy_avatar'])->name('avatar-buy');
    Route::post('/avatar/change-profile', [AvatarController::class, 'change_profile'])->name('change-profile');
    Route::post('/avatar/remove-profile', [AvatarController::class, 'remove_profile'])->name('remove-profile');
    Route::get('/avatar/show-off', [AvatarController::class, 'show_off'])->name('show-off');
});

Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('set-locale');
