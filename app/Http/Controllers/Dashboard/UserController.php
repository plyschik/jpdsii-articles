<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(StoreUser $request)
    {
        $user = User::create([
            'email' => $request->get('email'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'password' => bcrypt($request->get('password')),
            'api_token' => Str::random(60)
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
        $users = User::with(['roles'])->latest('id');

        if ($request->has('search')) {
            $search = $request->get('search');

            $users
                ->where('email', 'LIKE', "{$search}%")
                ->orWhere('first_name', 'LIKE', "{$search}%")
                ->orWhere('last_name', 'LIKE', "{$search}%")
            ;
        }

        return view('dashboard.users.list', [
            'users' => $users->paginate(config('site.dashboard.limits.users'))
        ]);
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(StoreUser $request, User $user)
    {
        try {
            $role = Role::findOrFail($request->get('role_id'));
        } catch (ModelNotFoundException $exception) {
            return back()->with(__('warning', 'messages.site.alerts.something_went_wrong'));
        }

        try {
            $user->syncRoles($role);
            $user->update([
                'email' => $request->get('email'),
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'password' => bcrypt($request->get('password'))
            ]);
        } catch (ModelNotFoundException $exception) {
            return back()->with('warning', __('messages.site.alerts.something_went_wrong'));
        }

        return redirect()
            ->route('dashboard.users.list')
            ->with('success', __('messages.dashboard.alerts.users.edited'))
        ;
    }

    public function delete(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $exception) {
            return back()->with('warning', __('messages.site.alerts.something_went_wrong'));
        }

        return back()->with('success', __('messages.dashboard.alerts.users.deleted'));
    }
}
