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

Route::get('/', 'ArticlesController@list')->name('front.articles.list');
Route::get('/article/{id}', 'ArticlesController@show')->name('front.articles.show');

Route::get('/category/{categoryId}', 'CategoriesController@listOfArticlesOfCategory')->name('site.category.list');
Route::get('/author/{authorId}', 'AuthorsController@listOfArticlesOfAuthor')->name('site.authors.list');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/articles', 'Dashboard\ArticlesController@list')->name('dashboard.articles.list');
    Route::get('/articles/create', 'Dashboard\ArticlesController@create')->name('dashboard.articles.create');
    Route::post('/articles/create', 'Dashboard\ArticlesController@store')->name('dashboard.articles.create');
    Route::get('/articles/edit/{id}', 'Dashboard\ArticlesController@edit')->name('dashboard.articles.edit');
    Route::post('/articles/edit/{id}', 'Dashboard\ArticlesController@update')->name('dashboard.articles.edit');
    Route::delete('/articles/{id}', 'Dashboard\ArticlesController@delete')->name('dashboard.articles.delete');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:administrator']], function () {
    Route::get('/categories', 'Dashboard\CategoriesController@list')->name('dashboard.categories.list');
    Route::get('/categories/create', 'Dashboard\CategoriesController@create')->name('dashboard.categories.create');
    Route::post('/categories/create', 'Dashboard\CategoriesController@store')->name('dashboard.categories.create');
    Route::get('/categories/edit/{id}', 'Dashboard\CategoriesController@edit')->name('dashboard.categories.edit');
    Route::post('/categories/edit/{id}', 'Dashboard\CategoriesController@update')->name('dashboard.categories.edit');
    Route::delete('/categories/{id}', 'Dashboard\CategoriesController@delete')->name('dashboard.categories.delete');
});