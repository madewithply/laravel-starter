<?php

namespace App\Providers;

use App\Services\Models\CompanyService;
use App\Services\Models\PositionService;
use App\Services\Models\UserService;
use Illuminate\Support\ServiceProvider;

class ModelsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerModelServices();
    }

    private function registerModelServices()
    {

        // User Service
        $this->app->bind('App\Services\Models\UserService', function () {
            return new UserService();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            UserService::class
        ];
    }
}
