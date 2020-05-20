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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{user}', 'IndexController@home')->where('user', '[0-9]+')->name('top.home');
Route::get('/form/{user}', 'IndexController@showForm')->where('user', '[0-9]+')->name('top.form');
Route::post('/register', 'IndexController@register')->name('top.register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/index/{user}', 'IndexController@index')->where('user', '[0-9]+')->name('top.index');
    Route::get('/read/{user}', 'IndexController@read')->where('user', '[0-9]+')->name('top.read');
    Route::get('/alreadyread/{message}', 'IndexController@preRead')->where('message', '[0-9]+')->name('alreadyRead');
    Route::get('/unread/{message}', 'IndexController@unread')->where('message', '[0-9]+')->name('unread');
});


Route::get('/login/twitter', 'Auth\OAuthLoginController@sociallogin')->name('twitter.login');
Route::get('/login/twitter/callback', 'Auth\OAuthLoginController@handleProviderCallback');




