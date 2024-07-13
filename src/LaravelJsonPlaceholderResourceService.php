<?php

namespace JsonRai277\LaravelJsonPlaceholder;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class LaravelJsonPlaceholderResourceService
{
    /**
     * Resource bind key.
     */
    public const RESOURCE_BIND_KEY = 'laravel-json-placeholder::resources';

    /**
     * Template engine bind key.
     */
    public const TEMPLATE_ENGINE_KEY = 'laravel-json-placeholder::template-engine';

    /**
     * Get the binded resources in the container.
     */
    public static function getBindedResources(): array
    {
        return app(self::RESOURCE_BIND_KEY);
    }

    /**
     * Get the template engine to use for views.
     */
    public static function getTemplateEngine(): string
    {
        return app(self::TEMPLATE_ENGINE_KEY);
    }

    /**
     * Get the injected resource in the container from the provided uri.
     */
    public static function getResourceFromUri(string $uri): null|array
    {
        $uri = trim(parse_url($uri, PHP_URL_PATH), '/');

        return collect(self::getBindedResources())->filter(function ($resource) use ($uri) {
            $resourceUri = trim($resource['uri'], '/');
            return Str::is(trim($resource['uri'], '/'), $uri) || Str::is($resourceUri . '/' . '*', $uri);
        })->first();
    }

    /**
     * Returns a paginated resource items.
     */
    public static function paginateItems(array $items, string $path): LengthAwarePaginator
    {
        $perPage = LaravelJsonPlaceholderConfig::getConfig('pagination_size', 10);
        $currentPage = max((int) request('page', 1), 1);  // Ensure currentPage is at least 1

        $totalNumberOfItems = count($items);
        $maxPage = max((int) ceil($totalNumberOfItems / $perPage), 1);

        // Adjust currentPage if it exceeds maxPage.
        $currentPage = min($currentPage, $maxPage);

        $currentPageItems = array_slice($items, $perPage * ($currentPage - 1), $perPage);

        return new LengthAwarePaginator($currentPageItems, $totalNumberOfItems, $perPage, $currentPage, ['path' => $path]);
    }

    /**
     * Should display random background color.
     */
    public static function shouldDisplayRandomBackgroundColor(): bool
    {
        return LaravelJsonPlaceholderConfig::getConfig('randomize_background_color', true);
    }

    /**
     * Get the random background color.
     */
    public static function getRandomBackgroundColor(): string
    {
        $colors = LaravelJsonPlaceholderConfig::getConfig('background_colors', ['bg-indigo-400']);

        return $colors[array_rand($colors)];
    }

    /**
     * Add background class to classes.
     */
    public static function addBackgroundClassToClasses(array $classes): array
    {
        if (static::shouldDisplayRandomBackgroundColor()) {
            return array_merge(
                $classes,
                [LaravelJsonPlaceholderResourceService::getRandomBackgroundColor()],
            );
        }

        return array_merge($classes, ['bg-indigo-400']);
    }
}
