<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class SigninController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    public function __construct()
    {
        $this->redirectTo = route('dashboard.index');
        $this->middleware('guest')->except('signout');
    }

    public function signinForm()
    {
        return view('dashboard.signin');
    }

    public function signin(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function signout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('dashboard.signin');
    }
}
