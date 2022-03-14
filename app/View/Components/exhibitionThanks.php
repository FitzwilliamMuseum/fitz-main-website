<?php

namespace App\View\Components;

use Illuminate\View\Component;

class exhibitionThanks extends Component
{
    public $exhibition;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $exhibition)
    {
        $this->exhibition = $exhibition;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.exhibition-thanks');
    }
}
