<?php

namespace App\Http\Controllers;

use App\Article;

class AuthorsController extends Controller
{
    public function listOfArticlesOfAuthor($id)
    {
        $articles = Article::select(['id', 'user_id', 'category_id', 'title', 'content', 'created_at'])
            ->with(['user:id,first_name,last_name', 'category:id,name'])
            ->where('user_id', $id)
            ->latest('id')
            ->paginate(config('site.limits.articles'))
        ;

        return view('site.authors.list', compact('articles'));
    }
}
