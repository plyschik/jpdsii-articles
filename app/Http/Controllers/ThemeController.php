<?php

namespace App\Http\Controllers;

class ThemeController extends Controller
{
    public function change()
    {
        if (!in_array(request()->theme, config('site.themes'))) {
            return redirect()->back()->withCookie(cookie()->forget('theme'));
        }

        return redirect()->back()->withCookie(cookie('theme', request()->theme, 60 * 24 * 30));
    }
}