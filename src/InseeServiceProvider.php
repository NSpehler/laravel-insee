<?php

namespace NSpehler\LaravelInsee;

use Illuminate\Support\ServiceProvider;

class InseeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/insee.php' => config_path('insee.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('laravel-insee', function () {
            return new Insee();
        });
    }
}
