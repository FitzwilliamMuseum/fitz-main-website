<?php

namespace App\View\Components;

use Illuminate\View\Component;

class pressCard extends Component
{
    public $release;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $release)
    {
        $this->release = $release;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.press-card');
    }
}
