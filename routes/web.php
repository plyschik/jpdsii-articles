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

Route::get('/dashboard/signin', 'Dashboard\SigninController@showLoginForm')->name('dashboard.signin');
Route::post('/dashboard/signin', 'Dashboard\SigninController@login')->name('dashboard.signin');
Route::post('/dashboard/signout', 'Dashboard\SigninController@logout')->name('dashboard.signout');

Route::get('/', function () {
    return view('site.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})
    ->name('dashboard.index')
    ->middleware('auth')
;

Route::get('/dashboard/signin', function () {
    return view('dashboard.signin');
})->middleware('guest');

