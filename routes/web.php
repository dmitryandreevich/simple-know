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
Route::get('/signin', function () {
    return view('auth.signIn');
});
Route::get('/signupemail', function () {
    return view('auth.signUpEmail');
});