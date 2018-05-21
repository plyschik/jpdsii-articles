<?php

namespace App\Http\Controllers;

class LocaleController extends Controller
{
    public function locale($locale)
    {
        if (in_array($locale, config('site.locales'))) {
            session()->put('locale', $locale);
        }

        return back();
    }
}