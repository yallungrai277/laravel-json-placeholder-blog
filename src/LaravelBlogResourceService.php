<?php

namespace JsonRai277\LaravelBlog;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Str;

class LaravelBlogResourceService
{
    /**
     * Resource bind key.
     */
    const RESOURCE_BIND_KEY = 'laravel-blog:resources';

    /**
     * Get the binded resources in the container.
     */
    public static function getBindedResources(): array
    {
        try {
            $resources = app(self::RESOURCE_BIND_KEY);
        } catch (BindingResolutionException $e) {
            return [];
        }

        return $resources;
    }

    /**
     * Register resource bindings.
     */
    public static function registerResourceBindings(array $resource): void
    {
        $resources = self::getBindedResources();

        app()->bind(self::RESOURCE_BIND_KEY, function () use ($resources, $resource) {
            return array_merge($resources, [$resource]);
        });
    }

    /**
     * Get the injected resource in the container from the provided uri.
     */
    public static function getResourceFromUri(string $uri): null|array
    {
        $uri = trim(parse_url($uri, PHP_URL_PATH), '/');

        return collect(self::getBindedResources())->filter(function ($resource) use ($uri) {
            $resourceUri = trim($resource['uri'], '/');
            return Str::is($resourceUri, $uri) || Str::is($resourceUri . '/' . '*', $uri);
        })->first();
    }
}