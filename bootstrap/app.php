<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect;
use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // web: __DIR__.'/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',

    )
    ->withMiddleware(function (Middleware $middleware): void {

    $middleware->redirectGuestsTo(function () {
        if (request()->is('*/admin/*'))
            return route('admin.login');
        else
            return route('user.login');
    });

    $middleware->redirectUsersTo(function () {
        if (Auth::guard('admin')->check())
            return route('admin.dashboard');
        else{
            return route('user.index');
        }
            
    });
        $middleware->alias([
            /**** OTHER MIDDLEWARE ALIASES ****/
            'localize'                => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
            'localizationRedirect'    => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            'localeSessionRedirect'   => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            'localeCookieRedirect'    => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
            'localeViewPath'          => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,
            'admin' => \App\Http\Middleware\AdminAuthinticate::class,
            // 'auth' => \App\Http\Middleware\Authenticate::class,
            // 'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'perm' => \App\Http\Middleware\CheckPermession::class

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    // for all web routes
    ->withRouting(function () {
        Route::prefix(LaravelLocalization::setLocale())
            ->middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
            ->group(base_path('routes/web.php'));

        Route::prefix(LaravelLocalization::setLocale() . '/user')
            ->middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
            ->group(base_path('routes/user.php'));
    })

    ->create();
