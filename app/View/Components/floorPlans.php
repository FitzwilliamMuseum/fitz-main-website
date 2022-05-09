<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class floorPlans extends Component
{
    public array $floorplans;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $floorplans)
    {
        $this->floorplans = $floorplans;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.floor-plans');
    }
}
