<?php

namespace PhilMareu\LaraManagerBlog;

use Illuminate\Support\ServiceProvider;

class LaraManagerBlogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../../routes/web.php');

        $this->publishes([
            __DIR__ . '/../../../database/migrations/' => database_path('migrations')
        ], 'laramanager-blog-migrations');
    }

    public function register()
    {

    }
}