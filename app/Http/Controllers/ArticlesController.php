<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{
    public function list()
    {
        return view('site.articles.list', [
            'articles' => Article::with('user')->paginate(10)
        ]);
    }

    public function show($id)
    {
        return view('site.articles.show', [
            'article' => Article::findOrFail($id)
        ]);
    }
}
