<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
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
     * @return View
     */
    public function render(): View
    {
        return view('components.ciim-card');
    }
}
