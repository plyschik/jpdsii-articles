<?php

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;

class CategoriesPanelComposer
{
    public function compose(View $view)
    {
        $categories = cache()->remember('categories', config('cache.ttl'), function () {
            return Category::select(['id', 'name'])
                ->withCount('articles')
                ->orderBy('name')
                ->limit(config('site.limits.categories'))
                ->get();
        });

        $view->with('categories', $categories);
    }
}