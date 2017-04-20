<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotStdUpdateAdmin
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
            'StdUpdate',
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
