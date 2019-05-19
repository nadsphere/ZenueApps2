<?php

Route::get('/', function () {
    return view('pages.index');
});
Route::get('/edit_user', function () {
    return view('pages.user_editprofile');
});
Route::get('/request', function () {
    return view('pages.user_transact');
});
Route::get('/ambil_paket', function () {
    return view('pages.form_ambilpaket');
});
Route::get('/edit_eo', function () {
    return view('pages.eo_editprofile');
});

Route::get('/eo_profile', function () {
    return view('pages.eo_profile');
});

Route::get('/store', function () {
    return view('pages.eo_profile');
});

Route::get('/dashboard', 'TemplateControl@index');

Route::get('/form', function () {
    return view('pages.form');
});

Route ::post('/registereo', 'UserController@store_eo');

// LOGIN, REGISTER, LOGOUT
Route::group(['middleware' => 'web'], function () {
    Route::post('/register', 'UserController@store');
    Route::post('/login', 'UserController@login');
    Route::get('/logout', 'UserController@logout');
    Route::get('/', 'UserController@index');
});

//PAKET
Route::get('/paket','PaketController@index');
Route::post('/insert','PaketController@store');
Route::get('/paket_edit/{id}','PaketController@edit');
Route::post('/update/{id}','PaketController@update');
Route::get('/hapus_paket/{id}','PaketController@destroy');
Route::get('/detail_paket/{id}','PaketController@index_detail');

Route::resource('pakets', 'PaketController');

//SEARCHING
Route::post('/search', 'PaketController@search');
