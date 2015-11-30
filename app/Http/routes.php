<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/resource', ['as' => 'resource', function() {
        return view('resource');
    }]);

    //Route::get('patata', ['as' => 'patata' uses => 'PatataController@getPatata']);
});

Route::get('/phpinfo', function() {
    return phpinfo();
});

Route::get('/flushSession', function () {
    Session::flush();
});

Route::get('/checkEmailExists',
    ['as' => 'checkEmailExists',
     'uses' => 'ApiController@checkEmailExists'
    ]);
