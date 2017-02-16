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
        //dd(Auth::user()->getAllroles());
        $authRoles = [
            'admin',
            'Registration',
            'financial',
            'graduate',
            'technicalSupport',
            'academicAffairs',
            'blackboard',
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
