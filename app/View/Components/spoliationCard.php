<?php

namespace App\View\Components;

use Illuminate\View\Component;

class spoliationCard extends Component
{
    public array $claim;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $claim)
    {
        $this->claim = $claim;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.spoliation-card');
    }
}
