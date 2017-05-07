<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotExamsAdmin
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

        $authRoles = [
            'admin',
            'RM',
            'DM',
            'HM',
            'JM',
            'KM',
            'NM',
            'RF',
            'DF',
            'HF',
            'JF',
            'KF',
            'NF',
            'JK',
            'JD',
            'JQ',
        ];

        $userRoles = Auth::user()->getAllroles();


        foreach ($authRoles as $authRole) {
            if(array_key_exists($authRole,$userRoles)){
                return $next($request);
            }
        }

        return redirect('/login')->withErrors(trans('settings.notAuthMsg'));


    }
}
