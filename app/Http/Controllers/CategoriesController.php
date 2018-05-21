<?php

namespace App\Http\Controllers;

use App\Article;

class CategoriesController extends Controller
{
    public function listOfArticlesOfCategory($id)
    {
        $articles = Article::select(['id', 'user_id', 'category_id', 'title', 'content', 'created_at'])
            ->with(['user:id,first_name,last_name', 'category:id,name'])
            ->where('category_id', $id)
            ->latest('id')
            ->paginate(config('site.limits.articles'))
        ;

        return view('site.categories.list', compact('articles'));
    }
}
