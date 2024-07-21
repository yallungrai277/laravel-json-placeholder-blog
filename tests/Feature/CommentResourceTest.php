<?php

namespace JsonRai277\LaravelJsonPlaceholder\Tests\Feature;

use Illuminate\Support\Facades\Http;
use JsonRai277\LaravelJsonPlaceholder\Tests\TestCase;

class CommentResourceTest extends TestCase
{
    public function test_it_can_load_comments()
    {
        $this->assertItCanLoadComments();
        $this->assertItCanLoadComment();
    }

    public function assertItCanLoadComments()
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/comments' => Http::response(json_decode(file_get_contents(__DIR__ . '/../Fixtures/comments.json'), true))
        ]);

        $response = $this->get('/comments')->assertStatus(200);
        $response->assertSee('first@gmail.com');
        $response->assertSee('First comment');
    }

    public function assertItCanLoadComment()
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/comments/1' => Http::response(json_decode(file_get_contents(__DIR__ . '/../Fixtures/comment.json'), true))
        ]);

        $response = $this->get('/comments/1')->assertStatus(200);
        $response->assertSee('json@gmail.com');
        $response->assertSee('Hi, this is a test comment');
    }
}
