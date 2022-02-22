<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class imageCard extends Component
{

    public $title;
    public $altTag;
    public $params;
    public $image;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $route, array $params, string $title, string $altTag = NULL, array $image = NULL)
    {
        $this->route = $route;
        $this->params = $params;
        $this->title = $title;
        $this->altTag = $altTag;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.image-card');
    }
}
