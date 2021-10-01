<?php

namespace App\View\Components;

use Illuminate\View\Component;

class imageCard extends Component
{

    public $path;
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
    public function __construct(string $route, array $params, string $title, string $altTag, array $image = NULL)
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.image-card');
    }
}
