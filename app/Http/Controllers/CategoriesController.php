<?php

namespace App\Http\Controllers;

use App\Article;

class CategoriesController extends Controller
{
    public function listOfArticlesOfCategory($categoryId)
    {
        return view('site.categories.list', [
            'articles' => Article::with(['user', 'category'])->where('category_id', '=', $categoryId)->orderByDesc('created_at')->paginate(10)
        ]);
    }
}
