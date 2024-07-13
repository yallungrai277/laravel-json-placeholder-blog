<?php

namespace JsonRai277\LaravelJsonPlaceholder\Tests\Unit;

use JsonRai277\LaravelJsonPlaceholder\JsonPlaceHolder;
use JsonRai277\LaravelJsonPlaceholder\LaravelJsonPlaceholderResourceService;
use JsonRai277\LaravelJsonPlaceholder\Tests\TestCase;

class LaravelJsonPlaceholderServiceProviderTest extends TestCase
{
    public function test_service_container_bindings()
    {
        $this->assertNotEmpty(app(LaravelJsonPlaceholderResourceService::RESOURCE_BIND_KEY));
        $this->assertSame('blade', app(LaravelJsonPlaceholderResourceService::TEMPLATE_ENGINE_KEY));
        $this->assertNotEmpty(config('laravel-json-placeholder'));
        $this->assertNotNull(config('laravel-json-placeholder'));
        $this->assertInstanceOf(JsonPlaceHolder::class, app('JsonPlaceHolder'));
    }
}
