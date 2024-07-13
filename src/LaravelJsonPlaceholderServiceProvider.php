<?php

namespace JsonRai277\LaravelJsonPlaceholder;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use JsonRai277\LaravelJsonPlaceholder\Exceptions\LaravelJsonPlaceholderException;

class LaravelJsonPlaceholderServiceProvider extends ServiceProvider
{
    /**
     * Register service provider.
     */
    public function register(): void
    {
        // Merge config.
        $this->mergeConfigFrom(
            __DIR__ . '/config/laravel-json-placeholder.php',
            'laravel-json-placeholder'
        );

        $this->registerBindings();
    }

    /**
     * Boot service provider.
     */
    public function boot(): void
    {
        // Publish config.
        $this->publishes([
            __DIR__ . '/config/laravel-json-placeholder.php' => config_path('laravel-json-placeholder.php'),
        ]);

        // Load routes.
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // Load and publish views.
        $this->loadViewsFrom(__DIR__ . '/views', 'laravel-json-placeholder');
        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/laravel-json-placeholder'),
        ]);

        Blade::componentNamespace('JsonRai277\\LaravelJsonPlaceholder\\Components', 'laravel-json-placeholder');
    }

    /**
     * Register container bindings.
     */
    public function registerBindings(): void
    {
        $this->app->singleton('JsonPlaceHolder', fn () => new JsonPlaceHolder());
        $this->app->bind(LaravelJsonPlaceholderResourceService::RESOURCE_BIND_KEY, fn () => LaravelJsonPlaceholderConfig::getConfig('resources', []));

        $templateEngine = LaravelJsonPlaceholderConfig::getConfig('template_engine', 'blade');
        if ($templateEngine !== 'blade') {
            throw LaravelJsonPlaceholderException::invalidTemplateEngine();
        }
        $this->app->bind(LaravelJsonPlaceholderResourceService::TEMPLATE_ENGINE_KEY, fn () => $templateEngine);
    }
}
