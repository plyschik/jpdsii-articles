<?php

namespace App\Http\Middleware;

use Closure;

class PreventHistoryBack
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        return $response->withHeaders([
            'Pragma' => 'no-cache',
            'Expires' => 'Fri, 01 Jan 1990 00:00:00 GMT',
            'Cache-Control' => 'no-cache, must-revalidate, no-store, max-age=0, private'
        ]);
    }
}