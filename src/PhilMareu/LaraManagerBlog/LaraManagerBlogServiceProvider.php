<?php

namespace PhilMareu\LaramanagerBlog;

use Illuminate\Support\ServiceProvider;

class LaramanagerBlogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations')
        ], 'laramanager-blog-migrations');

        $this->loadViewsFrom(__DIR__.'/../../views', 'laramanager-blog');
    }

    public function register()
    {

    }
}