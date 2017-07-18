<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::group(['prefix' => 'api/v1'], function () {

    Route::get('users', [
      'uses' => 'ApiController@getUsers',
      'as' => 'api.getUsers'
    ]);

    Route::get('sessions', [
      'uses' => 'ApiController@getSessions',
      'as' => 'api.getSessions'
    ]);

  });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'user'], function () {

    Route::get('home', [
      'uses' => 'SiteController@getDashboard',
      'as' => 'site.getDashboard'
    ]);

});

Route::get('playground', [
  'uses' => 'SiteController@acceptMatch',
  'as' => 'api.playground'
]);

Route::post('accept-match', [
  'uses' => 'ApiController@acceptMatch',
  'as' => 'api.acceptMatch'
]);
