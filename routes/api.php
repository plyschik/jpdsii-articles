<?php

use App\Article;
use Illuminate\Http\Request;

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

Route::get('/search', function (Request $request) {
    $articles = [];

    if ($request->get('query')) {
        $articles = Article::query()
            ->select(['id', 'title'])
            ->where('title', 'LIKE', "%{$request->get('query')}%")
            ->orderByDesc('id')
            ->limit(4)
            ->get()
        ;
    }

    return response()->json($articles);
});