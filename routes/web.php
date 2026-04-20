<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\NotificationController;

// ========================
// Public Routes
// ========================

Route::get('/', [UserController::class, 'index']);

// Auth Routes (login/register/logout)
Route::middleware('web')->group(function () {
    Route::post('/register', [UserController::class, 'store']);
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::post('/registereo', [UserController::class, 'store_eo']);
});

// Static Pages
Route::view('/login', 'pages.login_page');
Route::view('/register', 'pages.register_page');
Route::get('/regist_eo', [UserController::class, 'showRegisterEo'])->middleware('web');
Route::get('/dashboard', [PaketController::class, 'dashboard']);
Route::view('/form', 'pages.form');
Route::get('/edit_user', [UserController::class, 'showEditProfile']);
Route::post('/edit_user', [UserController::class, 'updateProfile']);
Route::view('/edit_eo', 'pages.eo_editprofile');

// User Profile Routes
Route::get('/user_profile', [UserController::class, 'showUserProfile'])->name('user_profile');
Route::post('/user_profile/password', [UserController::class, 'updateUserPassword'])->name('user_profile.password');

// EO Profile Routes
Route::get('/eo_profile', [UserController::class, 'showEoProfile'])->name('eo_profile');
Route::get('/eo_profile/edit', [UserController::class, 'showEoProfile'])->name('eo_profile.edit');
Route::post('/eo_profile/update', [UserController::class, 'updateEoProfile'])->name('eo_profile.update');
Route::post('/eo_profile/password', [UserController::class, 'updatePassword'])->name('eo_profile.password');

Route::get('/booking', [TransactionController::class, 'userTransactions']);
Route::get('/booking/delete/{id}', [TransactionController::class, 'deleteUserTransaction']);
Route::post('/booking/store', [TransactionController::class, 'storeBooking']);

// Wishlist Routes
Route::get('/wishlist', [WishlistController::class, 'index']);
Route::post('/wishlist/toggle/{paketId}', [WishlistController::class, 'toggle']);
Route::get('/wishlist/remove/{id}', [WishlistController::class, 'remove']);

// Package Routes (Public Browsing - for regular users)
Route::get('/paket', [PaketController::class, 'browse']);
Route::post('/paket/rate', [PaketController::class, 'storeRating']);


// EO Routes
Route::get('/eo/approve_book', fn () => view('pages.eo_approv_book'));
Route::get('/eo/approve_book/details', fn () => view('pages.eo_approv_bookdet'));
Route::get('/eo/notif', [NotificationController::class, 'index']);
Route::get('/eo/notif/more', function () {
    if (!\Illuminate\Support\Facades\Auth::guard('users')->check()) {
        return redirect('/login');
    }
    return view('pages.eo_notif_detail');
});
Route::post('/eo/notif/mark-read/{id}', [NotificationController::class, 'markAsRead']);
Route::post('/eo/notif/mark-all-read', [NotificationController::class, 'markAllAsRead']);
Route::post('/eo/notif/delete/{id}', [NotificationController::class, 'destroy']);
Route::get('/notifications/unread-count', [NotificationController::class, 'unreadCount']);

// User Routes
Route::get('/user/approve_book', fn () => view('pages.user_approv_book'));
Route::get('/user/approve_book/details', fn () => view('pages.user_approv_bookdet'));
Route::get('/user/notif', [NotificationController::class, 'index']);
Route::get('/user/notif/more', function () {
    if (!\Illuminate\Support\Facades\Auth::guard('users')->check()) {
        return redirect('/login');
    }
    return view('pages.user_notif_detail');
});
Route::post('/user/notif/mark-read/{id}', [NotificationController::class, 'markAsRead']);
Route::post('/user/notif/mark-all-read', [NotificationController::class, 'markAllAsRead']);
Route::post('/user/notif/delete/{id}', [NotificationController::class, 'destroy']);
Route::get('/user/payments', fn () => view('pages.user_mtd_payment'));

// ========================
// Package Routes
// ========================

Route::get('/orders', [PaketController::class, 'index']);
Route::get('/manage_paket', [PaketController::class, 'manage_paket']);
Route::post('/paket/store', [PaketController::class, 'store']);
Route::post('/paket/update', [PaketController::class, 'update']);
Route::put('/paket/update', [PaketController::class, 'update']);
Route::get('/paket_edit/{id}', [PaketController::class, 'edit']);
Route::post('/update/{id}', [PaketController::class, 'update']);
Route::get('/hapus_paket/{id}', [PaketController::class, 'destroy']);
Route::get('/detail_paket/{id}', [PaketController::class, 'index_detail']);
Route::resource('pakets', PaketController::class)->except(['create', 'edit']);

// ========================
// Transaction Routes
// ========================

Route::get('/ambil_paket/{idpaket}', [TransactionController::class, 'index_paket']);
Route::post('/form_paket', [TransactionController::class, 'store_transactions']);
Route::get('/transact_detail/{id}', [TransactionController::class, 'transact_detail']);
Route::post('/transact_detail/{id}/update-status', [TransactionController::class, 'update_status']);

// ========================
// Search Routes
// ========================

Route::post('/search', [PaketController::class, 'search']);

// ========================
// Charts (Dev/Admin)
// ========================

// Home Fallback
Route::get('/home', fn () => redirect('/'));
