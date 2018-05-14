<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('site.partials.categories', 'App\Http\ViewComposers\CategoriesPanelComposer');
        View::composer(['dashboard.articles.create', 'dashboard.articles.edit'], 'App\Http\ViewComposers\DashboardCategoriesComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
