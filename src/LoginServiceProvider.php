<?php

namespace RedJasmine\Login;

use Illuminate\Support\ServiceProvider;

class LoginServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../lang', 'red-jasmine.login');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'red-jasmine.login');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/../routes/user/api.php');
         $this->loadRoutesFrom(__DIR__.'/../routes/user/web.php');

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
        $this->mergeConfigFrom(__DIR__.'/../config/login.php', 'red-jasmine.login');

        // Register the service the package provides.
        $this->app->singleton('red-jasmine.login', function ($app) {
            return new Login();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['red-jasmine.login'];
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
                             __DIR__.'/../config/login.php' => config_path('red-jasmine/login.php'),
                         ], 'red-jasmine-login-config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/:lc:vendor'),
        ], 'red-jasmine-login-views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/:lc:vendor'),
        ], 'red-jasmine-login-views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/:lc:vendor'),
        ], 'red-jasmine-login-views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
