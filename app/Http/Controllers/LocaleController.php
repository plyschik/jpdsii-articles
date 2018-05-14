<?php

namespace App\Http\Controllers;

class LocaleController extends Controller
{
    public function locale($locale)
    {
        if (in_array($locale, ['en', 'pl'])) {
            session()->put('locale', $locale);
        }

        return back();
    }
}
