<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ciimCard extends Component
{
    public $record;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($record)
    {
        $this->record = $record;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ciim-card');
    }
}
