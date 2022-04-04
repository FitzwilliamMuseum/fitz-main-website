<?php

namespace App\View\Components;

use Illuminate\View\Component;

class faq extends Component
{
    public array $faq;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $faq)
    {
        $this->faq = $faq;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.faq');
    }
}
