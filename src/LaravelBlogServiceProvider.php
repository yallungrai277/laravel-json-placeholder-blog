<?php

namespace JsonRai277\LaravelBlog;

use Illuminate\Support\ServiceProvider;

class LaravelBlogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('JsonPlaceHolder', fn () => new JsonPlaceHolder);
    }

    public function boot()
    {
        // Load config.
        $this->publishes([
            __DIR__ . '/config/laravel-blog.php' => config_path('laravel-blog.php'),
        ]);

        // Load routes.
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }
}