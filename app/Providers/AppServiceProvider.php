<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //use bootstrab
        Paginator::useBootstrap();

        Model::unguard();


        foreach (config('permessions') as $key => $value) {
            Gate::define($key, function (Admin $admin) use ($key) {
                
                return $admin->hasAccess($key);
            });
        }

    }
}
