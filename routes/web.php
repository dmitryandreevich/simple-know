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

Route::get('/signup', function () {
    return view('auth.signUp');
});

Auth::routes();

Route::group(['namespace' => 'Auth'], function (){

    Route::get('/signup','RegisterController@main')->name('register.main');
    Route::get('/signupemail','RegisterController@index')->name('register.index');
    Route::post('/signupemail','RegisterController@registerByEmail')->name('register.email');

    Route::get('/signin','LoginController@index')->name('login.index');
    Route::post('/signin','LoginController@loginByEmail')->name('login.email');

    Route::get('/signup-vk', 'RegisterController@registerByVk')->name('register.vk');
    Route::get('/signin-vk', 'LoginController@loginByVk')->name('login.vk');
    Route::get('/signup-fb', 'RegisterController@registerByFb')->name('register.fb');
    Route::get('/signin-fb', 'LoginController@loginByFb')->name('login.fb');

    Route::get('/logout', 'LoginController@logout')->name('logout');
});
Route::get('/home', 'HomeController@index')->name('home');
