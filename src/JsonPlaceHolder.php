<?php

namespace JsonRai277\LaravelBlog;

use Exception;
use Illuminate\Support\Facades\Http;
use JsonRai277\LaravelBlog\Exceptions\ResponseFailedException;

class JsonPlaceHolder
{
    const FALLBACK_BASE_JSON_PLACEHOLDER_URL = 'https://jsonplaceholder.typicode.com';

    protected string $baseUrl = '';

    public function __construct()
    {
        $baseUrl = LaravelBlogConfig::getConfig('json_placeholder_base_url');
        $this->baseUrl = trim(empty($baseUrl) ? self::FALLBACK_BASE_JSON_PLACEHOLDER_URL : $baseUrl, " \/");
    }

    /**
     * Get resource from json placeholder.
     */
    public function getResource(string $path): array
    {
        $response =  Http::get($this->baseUrl . $path);

        try {
            $response->throwIf($response->failed());
        } catch (Exception $e) {
            throw new ResponseFailedException($e->getMessage(), $e->getCode());
        }

        return $response->json();
    }
}