<?php

namespace JsonRai277\LaravelJsonPlaceholder\Tests\Feature;

use Illuminate\Support\Facades\Http;
use JsonRai277\LaravelJsonPlaceholder\Tests\TestCase;

class TodoResourceTest extends TestCase
{
    public function test_it_can_load_todos()
    {
        $this->assertItCanLoadTodos();
        $this->assertItCanLoadTodo();
    }

    public function assertItCanLoadTodos()
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/todos' => Http::response(json_decode(file_get_contents(__DIR__ . '/../Fixtures/todos.json'), true))
        ]);

        $response = $this->get('/todos')->assertStatus(200);
        $response->assertSee('Complete exercise for today');
    }

    public function assertItCanLoadTodo()
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/todos/1' => Http::response(json_decode(file_get_contents(__DIR__ . '/../Fixtures/todo.json'), true))
        ]);

        $response = $this->get('/todos/1')->assertStatus(200);
        $response->assertSee('Finish course');
    }
}
