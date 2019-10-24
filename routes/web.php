<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'LoginController@login')->name('login')->middleware('guest');
Route::post('login', 'LoginController@authenticate')->name('authenticate');

Route::name('admin.')->group(function (){
    Route::group([
        'middleware' => ['auth:web', 'permission:edit all'],
        'namespace' => 'Admin'
    ], function () {

        //Dashboard
        Route::resource('dashboard', 'DashboardController');

    });
});
