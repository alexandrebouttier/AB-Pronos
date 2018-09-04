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
    return view('pages/home');
});

Route::get('/pronostics', function () {
    return view('pages/bets');
});

Route::get('/profil', function () {
    return view('pages/profil');
});

Route::get('/stats', function () {
    return view('pages/stats');
});

Route::get('/contact', function () {
    return view('pages/contact');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
