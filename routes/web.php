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

use Illuminate\Routing\RouteGroup;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('game/create', 'Admin\GameController@add');
    Route::get('game', 'Admin\GameController@index');
});

Route::get('user', 'User\GameController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
