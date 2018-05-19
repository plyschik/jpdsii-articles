<?php

namespace App\Http\Controllers;

use App\Category;

class CategoriesController extends Controller
{
    public function listOfArticlesOfCategory(Category $category)
    {
        return view('site.categories.list', [
            'articles' => $category->articles()->with(['user', 'category'])->latest('id')->paginate(10)
        ]);
    }
}
