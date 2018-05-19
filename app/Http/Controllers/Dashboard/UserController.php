<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
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
