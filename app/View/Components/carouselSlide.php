<?php

namespace App\View\Components;

use Illuminate\View\Component;

class carouselSlide extends Component
{
    public array $slides;
    public string $class;
    public string $imageObject;
    public string $title;
    public string $route;
    public string $param;
    public bool $slugify;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $slides, string $class, string $imageObject, string $title, string $route, string $param, bool $slugify)
    {
        $this->slides = $slides;
        $this->class = $class;
        $this->imageObject = $imageObject;
        $this->title = $title;
        $this->route = $route;
        $this->param = $param;
        $this->slugify = $slugify;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carousel-slide');
    }
}
