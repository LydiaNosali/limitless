<?php

namespace App\Http\Middleware;

use Closure;

class CheckComptable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->role == 'comptable')
        {
            return redirect('/permission-denied');
        };
        return $next($request);
    }
}
