<?php

namespace App\View\Components;

use Illuminate\View\Component;

class vacancy extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $vacancy)
    {
        $this->vacancy = $vacancy;
    }

    public $vacancy;
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.vacancy');
    }
}
