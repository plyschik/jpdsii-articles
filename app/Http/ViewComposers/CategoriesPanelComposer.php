<?php

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;

class CategoriesPanelComposer
{
    public function compose(View $view)
    {
        $view->with('categories', Category::withCount('articles')->orderByDesc('name')->limit(4)->get());
    }
}