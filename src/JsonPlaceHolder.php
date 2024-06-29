<?php

namespace JsonRai277\LaravelJsonPlaceholder;

use Exception;
use Illuminate\Support\Facades\Http;
use JsonRai277\LaravelJsonPlaceholder\Exceptions\LaravelJsonPlaceholderException;

class JsonPlaceHolder
{
    protected string $baseUrl = '';

    public function __construct()
    {
        $baseUrl = LaravelJsonPlaceholderConfig::getConfig('json_placeholder_base_url', null);
        if (empty($baseUrl)) {
            throw LaravelJsonPlaceholderException::jsonPlacedHolderUrlNotSet();
        }
        $this->baseUrl = trim($baseUrl, " \/");
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
            throw LaravelJsonPlaceholderException::responseFailed($e->getMessage(), $e->getCode());
        }

        return $response->json();
    }
}
