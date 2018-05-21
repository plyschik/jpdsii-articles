<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\DashboardRolesComposer;
use App\Http\ViewComposers\CategoriesPanelComposer;
use App\Http\ViewComposers\DashboardCategoriesComposer;

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

        View::composer('site.partials.categories', CategoriesPanelComposer::class);
        View::composer(['dashboard.articles.create', 'dashboard.articles.edit'], DashboardCategoriesComposer::class);
        View::composer(['dashboard.users.create', 'dashboard.users.edit'], DashboardRolesComposer::class);
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
