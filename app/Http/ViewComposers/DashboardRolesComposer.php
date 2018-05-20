<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class DashboardRolesComposer
{
    public function compose(View $view)
    {
        $view->with('roles', Role::all());
    }
}