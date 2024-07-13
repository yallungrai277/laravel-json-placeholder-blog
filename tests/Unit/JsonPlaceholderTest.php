<?php

namespace JsonRai277\LaravelJsonPlaceholder\Tests\Unit;

use JsonRai277\LaravelJsonPlaceholder\Exceptions\LaravelJsonPlaceholderException;
use JsonRai277\LaravelJsonPlaceholder\JsonPlaceHolder;
use JsonRai277\LaravelJsonPlaceholder\Tests\TestCase;

class JsonPlaceHolderTest extends TestCase
{
    public function test_api_returns_results()
    {
        $this->assertNotEmpty((new JsonPlaceHolder())->getResource('/posts'));
        $this->assertNotEmpty((new JsonPlaceHolder())->getResource('/albums'));
        $this->assertNotEmpty((new JsonPlaceHolder())->getResource('/comments'));
        $this->assertNotEmpty((new JsonPlaceHolder())->getResource('/todos'));
        $this->assertNotEmpty((new JsonPlaceHolder())->getResource('/users'));
    }

    public function test_exception_is_thrown_when_request_is_sent_to_invalid_path()
    {
        $this->expectException(LaravelJsonPlaceholderException::class);
        (new JsonPlaceHolder())->getResource('/invalid-path');
    }
}
