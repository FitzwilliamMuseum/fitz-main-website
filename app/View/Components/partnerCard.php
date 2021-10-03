<?php

namespace App\View\Components;

use Illuminate\View\Component;

class partnerCard extends Component
{

    public $title;
    public $altTag;
    public $image;
    public $url;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( string $title, string $altTag = NULL, array $image = NULL, $url = NULL)
    {
        $this->title = $title;
        $this->altTag = $altTag;
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
        return view('components.partner-card');
    }
}
