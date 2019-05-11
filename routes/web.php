<?php

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/paket','PaketController@index');
Route::get('/search_paket', function () {
    return view('pages.search_paket');
});
Route::post('/insert','PaketController@store');
Route::get('/paket_edit/{id}','paketController@edit');
Route::post('/update/{id}','paketController@update');
Route::get('/hapus_paket/{id}','paketController@destroy');
Route::get('/detail_paket','paketController@index');
Route::resource('pakets', 'paketController');