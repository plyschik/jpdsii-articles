<?php

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;

class DashboardCategoriesComposer
{
    public function compose(View $view)
    {
        $categories = Category::select(['id', 'name'])
            ->orderBy('name')
            ->get();

        $view->with('categories', $categories);
    }
}