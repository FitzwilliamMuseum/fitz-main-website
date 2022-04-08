<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ttnLabels extends Component
{
    public array $labels;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $labels)
    {
        $this->labels = $labels;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ttn-labels');
    }
}
