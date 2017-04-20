<?php

namespace App\Http;


use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Support\Facades\App;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:60,1',
        ],

        'conflictCP' => [
            \App\Http\Middleware\Authenticate::class,
            \App\Http\Middleware\RedirectIfNotConflictAdmin::class
        ],
        'warehouse' => [
            \App\Http\Middleware\Authenticate::class,
            \App\Http\Middleware\RedirectIfNotWarehouseAdmin::class
        ],
        'evaluation' => [
            \App\Http\Middleware\Authenticate::class,
            \App\Http\Middleware\RedirectIfNotEvaluationAdmin::class
        ],
        'objection' => [
            \App\Http\Middleware\Authenticate::class,
            \App\Http\Middleware\RedirectIfNotObjectionAdmin::class
        ],
         'helpdeskCP' => [
            \App\Http\Middleware\Authenticate::class,
            \App\Http\Middleware\RedirectIfNothelpdeskAdmin::class
        ],
        'CPfinance' => [
            \App\Http\Middleware\Authenticate::class,
            \App\Http\Middleware\RedirectIfNotFinanceAdmin::class
        ],

        'CPInfo' => [
            \App\Http\Middleware\Authenticate::class,
            \App\Http\Middleware\RedirectIfNotStdUpdateAdmin::class
        ]
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'guest' => RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'adminAuth' => \App\Http\Middleware\RedirectIfNotAdmin::class,
        'formSubmitCheck' => \App\Http\Middleware\RedirectIfSubmitted::class,
        'conflictAuth' => \App\Http\Middleware\RedirectIfNotConflictAdmin::class,
    ];
}
