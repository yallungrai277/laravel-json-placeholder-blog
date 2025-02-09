<?php

namespace JsonRai277\LaravelJsonPlaceholder\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use JsonRai277\LaravelJsonPlaceholder\LaravelJsonPlaceholderResourceService;

class ResourceController extends Controller
{
    /**
     * The template engine to use.
     */
    protected string $templateEngine;

    public function __construct()
    {
        $this->templateEngine = LaravelJsonPlaceholderResourceService::getTemplateEngine();
    }

    /**
     * The landing page.
     */
    public function landing(): View
    {
        $resources = LaravelJsonPlaceholderResourceService::getBindedResources();

        return view($this->getBaseViewPath() . '.landing', [
            'resources' => $resources
        ]);
    }

    /**
     * Get the index resource.
     */
    public function index(Request $request): View
    {
        $resource = $this->getResourceFromUri($request->getRequestUri());

        // Fetch paginated items from the JSON Placeholder resource service
        $paginator = LaravelJsonPlaceholderResourceService::paginateItems(
            app('JsonPlaceHolder')->getResource($resource['api_path']),
            $resource['uri']
        );

        $paginator->getCollection()->transform(function ($item) use ($resource) {
            $item['url'] = $resource['uri'] . '/' . $item['id'];
            return $item;
        });


        return view($this->getBaseViewPath() . '.resources.index.' . $resource['index-page'], [
            'resource' => $resource,
            'items' => $paginator->toArray()
        ]);
    }

    /**
     * Show a resource.
     */
    public function show(Request $request, int $id): View
    {
        $resource = $this->getResourceFromUri($request->getRequestUri());

        $item = app('JsonPlaceHolder')->getResource(rtrim($resource['api_path'], '/') . '/' . $id);

        return view($this->getBaseViewPath() . '.resources.show.' . $resource['show-page'], [
            'item' => $item,
            'resource' => $resource
        ]);
    }

    /**
     * Get the resource from uri.
     */
    public function getResourceFromUri(string $uri): array
    {
        $resource = LaravelJsonPlaceholderResourceService::getResourceFromUri($uri);

        abort_if(is_null($resource), 404, 'The resource could not be found.');

        return $resource;
    }

    /**
     * Get the base view path.
     */
    public function getBaseViewPath(): string
    {
        return 'laravel-json-placeholder::' . $this->templateEngine;
    }
}
