<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class staticImageCard extends Component
{
    public string $image;
    public string $route;
    public array $params;
    public string $alt;
    public string $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $image, string $route, string $alt, string $title, array $params = [])
    {
        $this->image = $image;
        $this->route = $route;
        $this->alt = $alt;
        $this->title = $title;
        $this->params = $params;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.static-image-card');
    }
}
