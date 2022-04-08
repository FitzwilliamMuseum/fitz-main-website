<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ttnLabel extends Component
{
    public array $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $label)
    {
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ttn-label');
    }
}
