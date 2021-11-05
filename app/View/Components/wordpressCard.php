<?php

namespace App\View\Components;

use Illuminate\View\Component;

class wordpressCard extends Component
{

    public $title;
    public $image;
    public $url;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( string $title, string $image = NULL, string $url = NULL)
    {
        $this->title = $title;
        $this->image = $image;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.wordpress-card');
    }
}
