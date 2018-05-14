<?php

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;

class CategoriesPanelComposer
{
    public function compose(View $view)
    {
        $categories = Category::withCount('articles')->orderByDesc('articles_count')->limit(4)->get();

        $view->with('categories', $categories);
    }
}