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

Route::get('/locale/{locale}', 'LocaleController@locale')->name('site.locale');

Route::get('/', 'ArticlesController@list')->name('site.articles.list');
Route::get('/category/{id}', 'CategoriesController@list')->name('site.categories.list');
Route::get('/author/{id}', 'AuthorsController@list')->name('site.authors.list');
Route::get('/article/{article}', 'ArticlesController@show')->name('site.articles.show');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/articles/create', 'Dashboard\ArticlesController@create')->name('dashboard.articles.create');
    Route::post('/articles/create', 'Dashboard\ArticlesController@store')->name('dashboard.articles.create');

    Route::get('/articles', 'Dashboard\ArticlesController@list')->name('dashboard.articles.list');

    Route::group(['middleware' => 'can:update,article'], function () {
        Route::get('/articles/edit/{article}', 'Dashboard\ArticlesController@edit')->name('dashboard.articles.edit');
        Route::patch('/articles/edit/{article}', 'Dashboard\ArticlesController@update')->name('dashboard.articles.edit');
    });

    Route::delete('/articles/{article}', 'Dashboard\ArticlesController@delete')
        ->name('dashboard.articles.delete')
        ->middleware('can:delete,article')
    ;
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:administrator']], function () {
    Route::get('/categories/create', 'Dashboard\CategoriesController@create')->name('dashboard.categories.create');
    Route::post('/categories/create', 'Dashboard\CategoriesController@store')->name('dashboard.categories.create');

    Route::get('/categories', 'Dashboard\CategoriesController@list')->name('dashboard.categories.list');

    Route::get('/categories/edit/{category}', 'Dashboard\CategoriesController@edit')->name('dashboard.categories.edit');
    Route::patch('/categories/edit/{category}', 'Dashboard\CategoriesController@update')->name('dashboard.categories.edit');

    Route::delete('/categories/{category}', 'Dashboard\CategoriesController@delete')->name('dashboard.categories.delete');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:administrator']], function () {
    Route::get('/users/create', 'Dashboard\UserController@create')->name('dashboard.users.create');
    Route::post('/users/create', 'Dashboard\UserController@store')->name('dashboard.users.create');

    Route::get('/users', 'Dashboard\UserController@list')->name('dashboard.users.list');

    Route::get('/users/edit/{user}', 'Dashboard\UserController@edit')->name('dashboard.users.edit');
    Route::patch('/users/edit/{user}', 'Dashboard\UserController@update')->name('dashboard.users.edit');

    Route::delete('/users/{user}', 'Dashboard\UserController@delete')
        ->name('dashboard.users.delete')
        ->middleware('can:delete,user')
    ;
});