<?php

namespace Ladminer;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Ladminer\Console\Commands\UpdateAdminer;

class LadminerServiceProvider extends ServiceProvider
{
    protected $namespace = 'Ladminer\Http\Controllers';

    protected $middleware = ['encrypt_cookies', 'add_queue_cookies', 'start_session'];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ladminer.php', 'ladminer');
        $this->publishThings();
        $this->loadViewsFrom(__DIR__.'/resources/views', 'adminer');

        // $this->loadViewsFrom(__DIR__.'/resources/views', 'lara-adminer');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->registerRoutes();
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        });
    }

    /**
    * Get the Blogg route group configuration array.
    *
    * @return array
    */
    private function routeConfiguration()
    {
        return [
            'namespace'  => $this->namespace,
            'middleware' => $this->middleware
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register facade
        $this->app->singleton('ladminer', function () {
            return new Ladminer;
        });
        $this->app->singleton('command.ladminer.update', function ($app) {
            return new UpdateAdminer($app['files']);
        });
    }

    public function publishThings()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ladminer.php' => config_path('ladminer.php'),
            ], 'config');
        }
    }
}
