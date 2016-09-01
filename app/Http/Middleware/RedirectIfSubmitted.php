<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfSubmitted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $form)
    {
        $forms = null;
        $redirectUrl = '/form';
        switch ($form){
            case 'emr':
                $forms = Auth::user()->emrForm()->get();
                $redirectUrl = '/form/emr';
                break;
        }
        //dd($forms);
        if($forms->isEmpty())
            return $next($request);
        else
        {
            return redirect($redirectUrl)->with('status', 'You are not allowed to submit a second application of this form');
        }

    }
}
