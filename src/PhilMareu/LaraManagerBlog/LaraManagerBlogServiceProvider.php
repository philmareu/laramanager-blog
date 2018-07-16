<?php

namespace PhilMareu\LaraManagerBlog;

use Illuminate\Support\ServiceProvider;

class LaraManagerBlogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../../src/routes/web.php');

        $this->publishes([
            __DIR__ . '/../../../src/database/migrations/' => database_path('migrations')
        ], 'laramanager-blog-migrations');
    }

    public function register()
    {

    }
}