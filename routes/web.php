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

Route::get('/signin', 'Auth\SigninController@signinForm')->name('dashboard.signin');
Route::post('/signin', 'Auth\SigninController@signin')->name('dashboard.signin');
Route::post('/signout', 'Auth\SigninController@signout')->name('dashboard.signout');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/', 'ArticlesController@list')->name('front.articles.list');
Route::get('/article/{id}', 'ArticlesController@show')->name('front.articles.show');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })
        ->name('dashboard.index')
        ->middleware('auth')
    ;

    Route::get('/articles', 'Dashboard\ArticlesController@list')->name('dashboard.articles.list');
});