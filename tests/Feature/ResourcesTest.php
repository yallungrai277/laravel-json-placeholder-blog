<?php

namespace JsonRai277\LaravelJsonPlaceholder\Tests\Feature;

use JsonRai277\LaravelJsonPlaceholder\LaravelJsonPlaceholderConfig;
use JsonRai277\LaravelJsonPlaceholder\Tests\TestCase;

class ResourcesTest extends TestCase
{
    public function test_it_can_load_resource_landing_page()
    {
        $this->get('/resources')
            ->assertStatus(200)
            ->assertSee('Posts')
            ->assertSee('Comments')
            ->assertSee('Albums')
            ->assertSee('Photos')
            ->assertSee('Todos')
            ->assertSee('Users');
    }
}
