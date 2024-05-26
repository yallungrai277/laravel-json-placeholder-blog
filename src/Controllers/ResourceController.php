<?php

namespace JsonRai277\LaravelBlog\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JsonRai277\LaravelBlog\LaravelBlogResourceService;

class ResourceController extends Controller
{
    /**
     * The landing page.
     */
    public function landing()
    {
        $resources = LaravelBlogResourceService::getBindedResources();
        dd($resources);
    }

    /**
     * Get the index resource.
     */
    public function index(Request $request)
    {
        $resource = $this->getResourceFromUri($request->getRequestUri());

        return app('JsonPlaceHolder')->getResource($resource['api_path']);
    }

    /**
     * Show a resource.
     */
    public function show(Request $request, int $id)
    {
        $resource = $this->getResourceFromUri($request->getRequestUri());

        return app('JsonPlaceHolder')->getResource(str_replace('*', $id, $resource['api_path'] . '/' . $id));
    }

    /**
     * Get the resource from uri.
     */
    public function getResourceFromUri(string $uri): array
    {
        $resource = LaravelBlogResourceService::getResourceFromUri($uri);

        abort_if(is_null($resource), 404, 'The resource could not be found.');

        return $resource;
    }
}