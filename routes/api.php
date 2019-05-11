<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
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
Route::resource('pakets', 'paketController');
