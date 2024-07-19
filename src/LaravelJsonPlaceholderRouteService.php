<?php

namespace JsonRai277\LaravelJsonPlaceholder;

use Illuminate\Support\Facades\Route;
use JsonRai277\LaravelJsonPlaceholder\Controllers\ResourceController;

class LaravelJsonPlaceholderRouteService
{
    /**
     * Register routes required by the application.
     */
    public static function registerRoutes(): void
    {
        // Register resource landing page.
        Route::get(trim(LaravelJsonPlaceholderConfig::getConfig('landing_page_uri'), '/'), [ResourceController::class, 'landing'])->name('resource.landing');
        // Register individual resources index and show pages.
        collect(LaravelJsonPlaceholderResourceService::getBindedResources())->each(function ($settings, $resource) {
            $path = trim($settings['uri'], " \/");
            Route::get($path, [ResourceController::class, 'index'])->name($resource . '.index');
            Route::get($path . '/{id}', [ResourceController::class, 'show'])->name($resource . '.show')->where('id', '[0-9]+');
        });
    }
}