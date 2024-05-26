<?php

namespace JsonRai277\LaravelBlog;

class LaravelBlogConfig
{
    /**
     * Get config.
     */
    public static function getConfig(?string $key = null, mixed $fallback = null): mixed
    {
        return config('laravel-blog' . (empty($key) ? '' : ".{$key}"), $fallback);
    }
}