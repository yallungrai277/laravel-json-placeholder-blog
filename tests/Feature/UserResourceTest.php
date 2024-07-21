<?php

namespace JsonRai277\LaravelJsonPlaceholder\Tests\Feature;

use Illuminate\Support\Facades\Http;
use JsonRai277\LaravelJsonPlaceholder\Tests\TestCase;

class UserResourceTest extends TestCase
{
    public function test_it_can_load_users()
    {
        $this->assertItCanLoadUsers();
        $this->assertItCanLoadUser();
    }

    public function assertItCanLoadUsers()
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/users' => Http::response(json_decode(file_get_contents(__DIR__ . '/../Fixtures/users.json'), true))
        ]);

        $response = $this->get('/users')->assertStatus(200);
        $response->assertSee('Betty Graham')->assertSee('betty@april.biz');
    }

    public function assertItCanLoadUser()
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/users/1' => Http::response(json_decode(file_get_contents(__DIR__ . '/../Fixtures/user.json'), true))
        ]);

        $response = $this->get('/users/1')->assertStatus(200);
        $response->assertSee('Leanne Graham')->assertSee('Sincere@april.biz');
    }
}
