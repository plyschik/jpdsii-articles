<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::all();

        return view('dashboard.users.create', compact('roles'));
    }

    public function store(StoreUser $request)
    {
        $user = User::create([
            'email' => $request->get('email'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'password' => bcrypt($request->get('password'))
        ]);

        $user->assignRole(Role::find($request->get('role_id')));

        if (!$user) {
            return back()->with('warning', __('messages.site.alerts.something_went_wrong'));
        }

        return redirect()
            ->route('dashboard.users.list')
            ->with('success', __('messages.dashboard.alerts.users.added'))
        ;
    }

    public function list(Request $request)
    {
        $users = User::with(['roles'])->orderByDesc('id');

        if ($request->has('search')) {
            $search = $request->get('search');

            $users
                ->where('email', 'LIKE', "{$search}%")
                ->orWhere('first_name', 'LIKE', "{$search}%")
                ->orWhere('last_name', 'LIKE', "{$search}%")
            ;
        }

        return view('dashboard.users.list', [
            'users' => $users->paginate(10)
        ]);
    }
}
