<?php

namespace App\View\Components;

use Illuminate\View\Component;

class fundraisingCard extends Component
{
    public array $donate;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $donate)
    {
        $this->donate = $donate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fundraising-card');
    }
}
