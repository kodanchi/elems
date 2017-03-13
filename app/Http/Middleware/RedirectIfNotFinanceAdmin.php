<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotFinanceAdmin
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

                return $next($request);
                break;
            default:
                return redirect('/login')->withErrors(trans('settings.notAuthMsg'));
        }
    }

}

