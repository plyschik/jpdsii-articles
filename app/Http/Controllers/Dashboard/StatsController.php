<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class StatsController extends Controller
{
    public function live()
    {
        return view('dashboard.stats.live');
    }
}