<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tessituraProductionCard extends Component
{
    public $production;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($production)
    {
        $this->production = $production;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tessitura-production-card');
    }
}
