<?php

namespace Dinyangetoh\SimpleTaskmanager;

use Illuminate\Support\ServiceProvider;

class TaskManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/views', 'taskmanager');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $this->publishes([__DIR__.'/assets' => public_path('vendor/simple-taskmanager'),
        ], 'public');

        $this->publishes([__DIR__.'/Views' => public_path('vendor/simple-taskmanager'),
        ], 'views');

        $this->publishes([
            __DIR__.'/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(TaskManager::class, function () {
            return new TaskManager();
        });

        $this->app->alias(TaskManager::class, 'Simpletaskmanager');
    }
}
