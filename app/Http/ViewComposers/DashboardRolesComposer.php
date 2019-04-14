<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class DashboardRolesComposer
{
    public function compose(View $view)
    {
        $roles = Role::select(['id', 'name'])
            ->orderBy('name')
            ->get();

        $view->with('roles', $roles);
    }
}