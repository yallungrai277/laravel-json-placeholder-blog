<?php

namespace JsonRai277\LaravelJsonPlaceholder;

class LaravelJsonPlaceholderConfig
{
    /**
     * Get config.
     */
    public static function getConfig(?string $key = null, mixed $fallback = null): mixed
    {
        return config('laravel-json-placeholder' . (empty($key) ? '' : ".{$key}"), $fallback);
    }

    /**
     * Set config.
     */
    public static function setConfig(string $key, mixed $value): void
    {
        config()->set('laravel-json-placeholder.' . $key, $value);
    }
}
