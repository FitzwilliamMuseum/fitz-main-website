<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class galleryCard extends Component
{

    public $title;
    public $altTag;
    public $params;
    public $image;
    public $route;
    public $status;
    public $source;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $route, array $params, string $title, string $altTag = NULL, array $image = NULL, array $status, string $source = NULL)
    {
        $this->route = $route;
        $this->params = $params;
        $this->title = $title;
        $this->altTag = $altTag;
        $this->image = $image;
        $this->status = $status;
        $this->source = $source;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.gallery-card');
    }
}
