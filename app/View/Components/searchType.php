<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use JetBrains\PhpStorm\Pure;

class searchType extends Component
{
    public string $title;
    public string $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    #[Pure] public function __construct($name)
    {
        $this->title = $this->titleString();
        $this->name = $name;
    }

    public function titleString(): string
    {
        return 'content';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.search-type');
    }
}
