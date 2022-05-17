<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class visitUsStaticCard extends Component
{
    public string $image;
    public string $route;
    public array $params;
    public string $alt;
    public string $title;
    public string $colWidth;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $image,string $route,array $params,string $alt, string $title, string $colWidth)
    {
        $this->image = $image;
        $this->route = $route;
        $this->params = $params;
        $this->alt = $alt;
        $this->title = $title;
        $this->colWidth = $colWidth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.visit-us-static-card');
    }
}
