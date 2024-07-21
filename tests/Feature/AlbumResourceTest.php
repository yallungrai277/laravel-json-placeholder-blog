<?php

namespace JsonRai277\LaravelJsonPlaceholder\Tests\Feature;

use Illuminate\Support\Facades\Http;
use JsonRai277\LaravelJsonPlaceholder\Tests\TestCase;

class AlbumResourceTest extends TestCase
{
    public function test_it_can_load_albums()
    {
        $this->assertItCanLoadAlbums();
        $this->assertItCanLoadAlbum();
    }

    public function assertItCanLoadAlbums()
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/albums' => Http::response(json_decode(file_get_contents(__DIR__ . '/../Fixtures/albums.json'), true))
        ]);

        $response = $this->get('/albums')->assertStatus(200);
        $response->assertSee('Trident album');
    }

    public function assertItCanLoadAlbum()
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/albums/1' => Http::response(json_decode(file_get_contents(__DIR__ . '/../Fixtures/album.json'), true))
        ]);

        $response = $this->get('/albums/1')->assertStatus(200);
        $response->assertSee('Solo album');
    }
}
