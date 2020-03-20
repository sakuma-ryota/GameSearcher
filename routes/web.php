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
    Route::post('game/create', 'Admin\GameController@create');
    Route::get('game', 'Admin\GameController@index');
    Route::get('game/edit', 'Admin\GameController@edit');
    Route::post('game/edit', 'Admin\GameController@update');
    Route::get('game/delete', 'Admin\GameController@delete');
    Route::get('/', 'Admin\GameController@show');
});

Route::get('', 'User\GameController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
