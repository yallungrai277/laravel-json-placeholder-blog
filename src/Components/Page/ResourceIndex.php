<?php

namespace JsonRai277\LaravelJsonPlaceholder\Components\Page;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use JsonRai277\LaravelJsonPlaceholder\LaravelJsonPlaceholderResourceService;

class ResourceIndex extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public array $items, public string $resourceTitle)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $view = sprintf('laravel-json-placeholder::%s.components.page.resource-index', LaravelJsonPlaceholderResourceService::getTemplateEngine());

        return view($view, [
            'containerClass' => LaravelJsonPlaceholderResourceService::addBackgroundClassToClasses([
                'flex',
                'items-center',
                'justify-center',
                'min-h-full',
                'h-auto',
                'flex-col',
                'overflow-y-scroll',
                'py-10',
            ])
        ]);
    }
}
