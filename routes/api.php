<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/search', 'APIController@search');
Route::post('/categories/exists', 'APIController@categoryNameUniqueCheck');
Route::post('/users/exists', 'APIController@userEmailUniqueCheck');