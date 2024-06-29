<?php

namespace JsonRai277\LaravelJsonPlaceholder\Components\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Album extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public array $album)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('laravel-json-placeholder::common.components.cards.album');
    }
}
