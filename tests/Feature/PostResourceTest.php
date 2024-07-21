<?php

namespace JsonRai277\LaravelJsonPlaceholder\Tests\Feature;

use Illuminate\Support\Facades\Http;
use JsonRai277\LaravelJsonPlaceholder\Tests\TestCase;

class PostResourceTest extends TestCase
{
    public function test_it_can_load_posts()
    {
        $this->assertItCanLoadPosts();
        $this->assertItCanLoadPost();
    }

    public function assertItCanLoadPosts()
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/posts' => Http::response(json_decode(file_get_contents(__DIR__ . '/../Fixtures/posts.json'), true))
        ]);

        $response = $this->get('/posts')->assertStatus(200);
        $response->assertSee('This is the first post title');
        $response->assertSee('This is the first post body');
        $response->assertSee('This is the tenth post title');
        $response->assertSee('This is the tenth post body');
    }

    public function assertItCanLoadPost()
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/posts/1' => Http::response(json_decode(file_get_contents(__DIR__ . '/../Fixtures/post.json'), true))
        ]);

        $response = $this->get('/posts/1')->assertStatus(200);
        $response->assertSee('Single post');
        $response->assertSee('Single post body');
    }
}
