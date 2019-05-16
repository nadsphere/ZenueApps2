<?php

Route::get('/paket','PaketController@index');
Route::get('/search_paket', function () {
    return view('pages.search_paket');
});
Route::get('/eo_profile', function () {
    return view('pages.eo_profile');
});
Route::get('/welcomes', function () {
    return view('pages.user_page');
});
Route::get('/store', function () {
    return view('pages.profil_eo');
});
Route::post('/insert','PaketController@store');
Route::get('/paket_edit/{id}','paketController@edit');
Route::post('/update/{id}','paketController@update');
Route::get('/hapus_paket/{id}','paketController@destroy');
Route::get('/detail_paket','paketController@index');
Route::resource('pakets', 'paketController');


Route::group(['middleware' => 'web'], function () {
    Route::post('/register', 'UserController@store');
    Route::post('/login', 'UserController@login');
    Route::get('/logout', 'UserController@logout');
    Route::get('/', 'UserController@index');
});

Route::post('/search', 'PaketController@search');
