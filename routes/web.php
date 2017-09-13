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

Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('guru')->group(function() {
  Route::get('/login', 'Auth\GuruLoginController@showLoginForm')->name('guru.login');
  Route::post('/login', 'Auth\GuruLoginController@login')->name('guru.login.submit');
  Route::get('/logout', 'Auth\GuruLoginController@logout')->name('guru.logout');
  Route::get('/', 'GuruController@index')->name('guru.dashboard');

  //password reset routes
  Route::post('/password/email', 'Auth\GuruForgotPasswordController@sendResetLinkEmail')->name('guru.password.email');
  Route::get('/password/reset', 'Auth\GuruForgotPasswordController@showLinkRequestForm')->name('guru.password.request');
  Route::post('/password/reset', 'Auth\GuruResetPasswordController@reset');
  Route::post('/password/reset/{token}', 'Auth\GuruResetPasswordController@showResetForm')->name('guru.password.reset');
});
