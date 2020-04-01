<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CheckClient
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

        if (auth()->check() && auth()->user()->date && (auth()->user()->date)->lessThan(now())) {
            $banned_days = now()->diffInDays(auth()->user()->date);
            auth()->logout();

            if ($banned_days > 14) {
                $message = 'Votre compte a été suspendu. Veuillez contacter l\'administrateur.';
            } else {
                $message = 'Votre compte a été suspendu depuis '.$banned_days.' '.Str::plural('jours', $banned_days).'. Veuillez contacter l\'administrateur.';
            }

            return redirect()->route('login')->withMessage($message);
        }
        if (auth()->user()->suspend=='oui'){
            auth()->logout();
            $message = 'Votre compte a été bloqué. Veuillez contacter l\'administrateur.';
            return redirect()->route('login')->withMessage($message);

        }
        if (Auth::user()->role != 'client')
        {
            return redirect('/permission-denied');
        };

        return $next($request);
    }
}
