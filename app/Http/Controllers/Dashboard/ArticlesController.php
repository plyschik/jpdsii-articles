<?php

namespace App\Http\Controllers\Dashboard;

use App\Article;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function list()
    {
        $articles = Article::with('user')->paginate(10);

        return view('dashboard.articles.list', [
            'articles' => $articles
        ]);
    }

    public function delete($id)
    {
        Article::findOrFail($id)->delete();

        return back();
    }
}