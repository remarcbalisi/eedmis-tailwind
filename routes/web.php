<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'LoginController@login')->name('login')->middleware('guest');
Route::get('logout', 'LoginController@logout')->name('logout')->middleware('auth');
Route::post('login', 'LoginController@authenticate')->name('authenticate');

Route::name('admin.')->group(function (){
    Route::group([
        'middleware' => ['auth:web', 'role:admin'],
        'namespace' => 'Admin'
    ], function () {

        //Dashboard
        Route::resource('dashboard', 'DashboardController');

        Route::group([
            'prefix' => 'market',
        ], function () {
            Route::name('market.')->group(function() {
                Route::resource('department', 'Market\MarketDepartmentController');
                Route::resource('stall', 'Market\MarketStallController');
            });
        });

    });
});
