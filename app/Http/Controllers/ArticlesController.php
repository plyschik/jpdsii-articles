<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{
    public function list()
    {
        $articles = Article::select(['id', 'user_id', 'category_id', 'title', 'content', 'created_at'])
            ->with(['user:id,first_name,last_name', 'category:id,name'])
            ->latest('id')
            ->paginate(config('site.limits.articles'))
        ;

        return view('site.articles.list', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('site.articles.show', compact('article'));
    }
}
