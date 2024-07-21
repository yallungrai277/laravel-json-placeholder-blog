<?php

namespace JsonRai277\LaravelJsonPlaceholder\Tests\Feature;

use Illuminate\Support\Facades\Http;
use JsonRai277\LaravelJsonPlaceholder\Tests\TestCase;

class PhotoResourceTest extends TestCase
{
    public function test_it_can_load_photos()
    {
        $this->assertItCanLoadPhotos();
        $this->assertItCanLoadPhoto();
    }

    public function assertItCanLoadPhotos()
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/photos' => Http::response(json_decode(file_get_contents(__DIR__ . '/../Fixtures/photos.json'), true))
        ]);

        $response = $this->get('/photos')->assertStatus(200);
        $response->assertSee('Sunshine coast');
    }

    public function assertItCanLoadPhoto()
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/photos/1' => Http::response(json_decode(file_get_contents(__DIR__ . '/../Fixtures/photo.json'), true))
        ]);

        $response = $this->get('/photos/1')->assertStatus(200);
        $response->assertSee('Mandy beach');
    }
}
