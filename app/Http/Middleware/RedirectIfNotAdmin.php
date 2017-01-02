<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //dd('sdsd');
        if(Auth::user()->getRole() == 'admin')
            return $next($request);

        return redirect('/home')->withErrors(trans('settings.notAuthMsg'));

    }
}
