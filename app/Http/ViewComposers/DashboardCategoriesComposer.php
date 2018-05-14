<?php

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;

class DashboardCategoriesComposer
{
    public function compose(View $view)
    {
        $view->with('categories', Category::all());
    }
}