<?php

namespace App\Http\Controllers;

use App\Article;

class CategoriesController extends Controller
{
    public function listOfArticlesOfCategory($categoryId)
    {
        return view('site.categories.list', [
            'articles' => Article::with(['user', 'category'])->where('category_id', '=', $categoryId)->orderByDesc('id')->paginate(10)
        ]);
    }
}
