<?php

// ========================
// Public Routes
// ========================

Route::get('/', 'UserController@index');

// Auth Routes (login/register/logout)
Route::group(['middleware' => 'web'], function () {
    Route::post('/register', 'UserController@store');
    Route::post('/login', 'UserController@login');
    Route::get('/logout', 'UserController@logout');
    Route::post('/registereo', 'UserController@store_eo');
});

// Static Pages
Route::view('/login', 'pages.login_page');
Route::view('/register', 'pages.register_page');
Route::view('/regist_eo', 'pages.register_eo');
Route::view('/dashboard', 'pages.dashpage');
Route::view('/form', 'pages.form');
Route::view('/edit_user', 'pages.user_editprofile');
Route::view('/edit_eo', 'pages.eo_editprofile');
Route::view('/eo_profile', 'pages.eo_profile');
Route::view('/request', 'pages.user_transact');

// EO Routes
Route::get('/eo/approve_book', function () {
    return view('pages.eo_approv_book');
});
Route::get('/eo/approve_book/details', function () {
    return view('pages.eo_approv_bookdet');
});
Route::get('/eo/notif', function () {
    return view('pages.eo_notification');
});
Route::get('/eo/notif/more', function () {
    return view('pages.eo_notif_detail');
});

// User Routes
Route::get('/user/approve_book', function () {
    return view('pages.user_approv_book');
});
Route::get('/user/approve_book/details', function () {
    return view('pages.user_approv_bookdet');
});
Route::get('/user/notif', function () {
    return view('pages.user_notification');
});
Route::get('/user/notif/more', function () {
    return view('pages.user_notif_detail');
});
Route::get('/user/payments', function () {
    return view('pages.user_mtd_payment');
});

// ========================
// Package Routes
// ========================

Route::get('/paket', 'PaketController@index');
Route::post('/insert', 'PaketController@store');
Route::get('/paket_edit/{id}', 'PaketController@edit');
Route::post('/update/{id}', 'PaketController@update');
Route::get('/hapus_paket/{id}', 'PaketController@destroy');
Route::get('/detail_paket/{id}', 'PaketController@index_detail');
Route::resource('pakets', 'PaketController');

// ========================
// Transaction Routes
// ========================

Route::get('/ambil_paket/{idpaket}', 'TransactionController@index_paket');
Route::post('/form_paket', 'TransactionController@store_transactions');

// ========================
// Search Routes
// ========================

Route::post('/search', 'PaketController@search');

// ========================
// Charts (Dev/Admin)
// ========================

Route::view('/chrt', 'pages.hula');

// Home Fallback
Route::get('/home', function () {
    return redirect('/');
});
