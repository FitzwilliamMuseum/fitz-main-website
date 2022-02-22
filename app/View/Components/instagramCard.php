<?php

namespace App\View\Components;

use Illuminate\View\Component;

class instagramCard extends Component
{
    public $instagram;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.instagram-card');
    }
}
