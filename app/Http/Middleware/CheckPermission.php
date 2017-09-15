<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Route;
use Gate;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $section = null)
    {
        if (Gate::allows($section)) {
            return $next($request);
        }

        return response()->view('layouts/basic', [
            'content' => view('errors/403')
        ]);
    }
}
