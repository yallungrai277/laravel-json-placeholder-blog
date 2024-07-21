<?php

namespace JsonRai277\LaravelJsonPlaceholder\Tests\Unit;

use JsonRai277\LaravelJsonPlaceholder\LaravelJsonPlaceholderResourceService;
use JsonRai277\LaravelJsonPlaceholder\Tests\TestCase;

class LaravelJsonPlaceholderResourceServiceTest extends TestCase
{
    public function test_it_can_get_resource_from_uri_provided()
    {
        $this->assertNotEmpty(LaravelJsonPlaceholderResourceService::getResourceFromUri('/posts'));
    }

    public function test_it_can_get_random_background_color()
    {
        $this->assertNotEmpty(LaravelJsonPlaceholderResourceService::getRandomBackgroundColor());
    }

    public function test_it_can_add_background_color_to_classes()
    {
        $this->assertCount(2, LaravelJsonPlaceholderResourceService::addBackgroundClassToClasses(['test-class']));
    }

    public function test_it_can_paginate_items()
    {
        $items = json_decode(file_get_contents(__DIR__ . '/../Fixtures/posts.json'), true);
        $paginatedItems = LaravelJsonPlaceholderResourceService::paginateItems($items, '/test')->toArray();

        $this->assertCount(10, $paginatedItems['data']);
        $this->assertSame(1, $paginatedItems['current_page']);
        $this->assertSame('/test?page=1', $paginatedItems['first_page_url']);
        $this->assertSame(1, $paginatedItems['from']);
        $this->assertSame(10, $paginatedItems['last_page']);
        $this->assertSame('/test?page=10', $paginatedItems['last_page_url']);
        $this->assertCount(12, $paginatedItems['links']);
        $this->assertSame('/test?page=2', $paginatedItems['next_page_url']);
        $this->assertSame('/test', $paginatedItems['path']);
        $this->assertSame(10, $paginatedItems['per_page']);
        $this->assertNull($paginatedItems['prev_page_url']);
        $this->assertSame(10, $paginatedItems['to']);
        $this->assertSame(100, $paginatedItems['total']);
    }
}
