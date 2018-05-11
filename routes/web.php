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

Route::get('/dashboard/signin', 'Dashboard\SigninController@signinForm')->name('dashboard.signin');
Route::post('/dashboard/signin', 'Dashboard\SigninController@signin')->name('dashboard.signin');
Route::post('/dashboard/signout', 'Dashboard\SigninController@signout')->name('dashboard.signout');

Route::get('/', function () {
    return view('site.index');
})
    ->name('articles.index')
;

Route::get('/dashboard', function () {
    return view('dashboard.index');
})
    ->name('dashboard.index')
    ->middleware('auth')
;

Route::get('/dashboard/signin', function () {
    return view('dashboard.signin');
})
    ->middleware('guest')
;

