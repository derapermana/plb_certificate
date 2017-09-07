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
Route::prefix('guru')->group(function(){
  Route::get('/login', 'Auth\GuruLoginController@showLoginForm')->name('guru.login');
  Route::post('/login', 'Auth\GuruLoginController@login')->name('guru.login.submit');
  Route::get('/', 'GuruController@index')->name('guru.dashboard');
});
