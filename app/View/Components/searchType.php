<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class searchType extends Component
{
    public string $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->title = $this->titleString();
    }

    public function titleString(): string
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
