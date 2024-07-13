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
        // @todo.
    }
}
