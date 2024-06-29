<?php

namespace JsonRai277\LaravelJsonPlaceholder\Components\Page;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use JsonRai277\LaravelJsonPlaceholder\LaravelJsonPlaceholderResourceService;

class ResourceShow extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $view = sprintf('laravel-json-placeholder::%s.components.page.resource-show', LaravelJsonPlaceholderResourceService::getTemplateEngine());

        return view($view);
    }
}
