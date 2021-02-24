<?php

namespace Galatanovidiu\LaravelSnacks;

use Galatanovidiu\LaravelSnacks\Commands\MakeMongoModel;
use Illuminate\Support\ServiceProvider;

class LaravelSnacksServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'galatanovidiu');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'galatanovidiu');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-snacks.php', 'laravel-snacks');

        // Register the service the package provides.
        $this->app->singleton('laravel-snacks', function ($app) {
            return new LaravelSnacks;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-snacks'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-snacks.php' => config_path('laravel-snacks.php'),
        ], 'laravel-snacks.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/galatanovidiu'),
        ], 'laravel-snacks.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/galatanovidiu'),
        ], 'laravel-snacks.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/galatanovidiu'),
        ], 'laravel-snacks.views');*/

        // Registering package commands.
         $this->commands([
             MakeMongoModel::class
         ]);
    }
}
