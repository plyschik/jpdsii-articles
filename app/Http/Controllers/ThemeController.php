<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ThemeController extends Controller
{
    public function change(Request $request)
    {
        if (!in_array($request->theme, ['darkly', 'solar'])) {
            return redirect()->back()->withCookie(Cookie::forget('theme'));
        }

        return redirect()->back()->withCookie(cookie('theme', $request->theme, 60 * 24 * 30));
    }
}