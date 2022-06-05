<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class searchType extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function content(): string
    {
        return 'content';
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View
    {
        return view('components.search-type');
    }
}
