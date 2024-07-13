<?php

namespace JsonRai277\LaravelJsonPlaceholder\Tests\Feature;

use JsonRai277\LaravelJsonPlaceholder\Tests\TestCase;

class ResourcesTest extends TestCase
{
    public function test_it_can_load_resource_landing_page()
    {
        $this->get('/resources')->assertStatus(200);
    }

    public function test_it_can_load_posts()
    {
        $this->get('/posts')->assertStatus(200);
    }

    public function test_it_can_load_comments()
    {
        $this->get('/comments')->assertStatus(200);
    }

    public function test_it_can_load_albums()
    {
        $this->get('/albums')->assertStatus(200);
    }

    public function test_it_can_load_todos()
    {
        $this->get('/todos')->assertStatus(200);
    }

    public function test_it_can_load_users()
    {
        $this->get('/users')->assertStatus(200);
    }
}
