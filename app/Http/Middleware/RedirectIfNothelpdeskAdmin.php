<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNothelpdeskAdmin
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
        switch (Auth::user()->getRole()){
            case 'admin':
            case 'Registration':
            case 'financial':
            case 'graduate':
            case 'technicalSupport':

                return $next($request);
                break;
            default:
                return redirect('/login')->withErrors(trans('settings.notAuthMsg'));
        }
    }
}
