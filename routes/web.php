<?php
//approval (EO)
Route::get('/transacts', function () {
    return view('pages.approval');
});

// halaman dashboard
Route::get('/dashpage', function () {
    return view('pages.dashpage');
});
Route::get('/chrt', function () {
    return view('pages.hula');
});
// Route::get('/dash_users', function () {
//     return view('pages.dashpage_user');
// });
// Route::get('/dash_eos', function () {
//     return view('pages.dashpage_eo');
// });
// Route::get('/dash_pakets', function () {
//     return view('pages.dashpage_paket');
// });
// Route::get('/dash_bookings', function () {
//     return view('pages.dashpage_booking');
// });
// Route::get('/dash_transacts', function () {
//     return view('pages.dashpage_transact');
// });
// Route::get('/dash_charts', function () {
//     return view('pages.dashpage_charts');
// });
Route::get('/dashboard', 'TemplateControl@index');
//end dashboard section

//login/egister non modals
Route::get('/login', function () {
    return view('pages.login_page');
});
Route::get('/register', function () {
    return view('pages.register_page');
});
Route::get('/regist_eo', function () {
    return view('pages.register_eo');
});
//end section

//NOTIF USER dan EO
Route::get('/eo_notif', function () {
    return view('pages.eo_notification');
});
Route::get('/user_notif', function () {
    return view('pages.user_notification');
});
//END


Route::get('/', function () {
    return view('pages.index');
});
Route::get('/edit_user', function () {
    return view('pages.user_editprofile');
});
Route::get('/request', function () {
    return view('pages.user_transact');
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

Route::get('/form', function () {
    return view('pages.form');
});

Route::post('/registereo', 'UserController@store_eo');
Route::post('/form_paket', 'TransactionController@store_transactions');
Route::get('/ambil_paket/{idpaket}', 'TransactionController@index_paket');

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
