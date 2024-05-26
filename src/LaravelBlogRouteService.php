<?php

namespace JsonRai277\LaravelBlog;

use Illuminate\Support\Facades\Route;
use JsonRai277\LaravelBlog\Controllers\ResourceController;
use JsonRai277\LaravelBlog\LaravelBlogResourceService;

class LaravelBlogRouteService
{
    /**
     * Default routes.
     */
    const ROUTES = [
        'posts' => [
            'uri' => '/posts',
            'api_path' => '/posts',
        ],
        'albums' => [
            'uri' => '/albums',
            'api_path' => '/albums',
        ],
        'users' => [
            'uri' => '/users',
            'api_path' => '/users',
        ]
    ];

    /**
     * Register routes required by the application.
     */
    public static function registerRoutes(): void
    {
        $customRoutePaths = LaravelBlogConfig::getConfig('resource_routes');

        // Register all resources.
        collect(self::ROUTES)->each(function ($resource, $resourceName) use ($customRoutePaths) {
            // Modify the resource if the user has provided a custom config path.
            $resource['uri'] = ($customRoutePaths[$resourceName] ?? null) ?? $resource['uri'];
            $resource['type'] = $resourceName;
            self::registerResourceRoutes($resource);
        });

        // Register resource landing page.
        Route::get('/resources', [ResourceController::class, 'landing'])->name('resource.landing');
    }

    /**
     * Register resource routes.
     */
    protected static function registerResourceRoutes(array $resource): void
    {
        if (empty($resource)) {
            return;
        }

        // Register resource bindings.
        LaravelBlogResourceService::registerResourceBindings($resource);

        $path = trim($resource['uri'], " \/");
        Route::get($path, [ResourceController::class, 'index'])->name($resource['type'] . '.index');
        Route::get($path . '/{id}', [ResourceController::class, 'show'])->name($resource['type'] . '.show');
    }
}