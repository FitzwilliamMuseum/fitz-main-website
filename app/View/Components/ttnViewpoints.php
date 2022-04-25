<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ttnViewpoints extends Component
{
    public array $viewpoint;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $viewpoint)
    {
        $this->viewpoint = $viewpoint;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ttn-viewpoints');
    }
}
