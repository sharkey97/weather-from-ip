<?php

namespace sharkey97\weatherfromip\Providers;

use Illuminate\Support\ServiceProvider;

class WeatherProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Register the configuration file for publishing
        $this->publishes([
            __DIR__.'/../config/apikeys.php' => config_path('apikeys.php'),
        ], 'config');

        // Load the routes and views
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../views', 'forecast');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Merge the package's configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/apikeys.php',
            'apikeys'
        );
    }
}
