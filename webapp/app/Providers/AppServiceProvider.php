<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        View::composer('*', function ($view) {

            $user = Auth::user();

            // Add the view name to the view
            $view_name = str_replace('.', '-', $view->getName());
            View::share('view_name', $view_name);

            // Add the user to the view
            View::share('user', $user);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing', 'develop')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }

}