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

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

    Route::get('/articles', 'Dashboard\ArticlesController@list')->name('dashboard.articles.list');
    Route::get('/articles/create', 'Dashboard\ArticlesController@create')->name('dashboard.articles.create');
    Route::post('/articles/create', 'Dashboard\ArticlesController@store')->name('dashboard.articles.create');
    Route::get('/articles/edit/{id}', 'Dashboard\ArticlesController@edit')->name('dashboard.articles.edit');
    Route::post('/articles/edit/{id}', 'Dashboard\ArticlesController@update')->name('dashboard.articles.edit');
    Route::delete('/articles/{id}', 'Dashboard\ArticlesController@delete')->name('dashboard.articles.delete');
});