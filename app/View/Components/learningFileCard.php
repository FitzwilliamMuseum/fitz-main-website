<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class learningFileCard extends Component
{
    public $file;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $file)
    {
        $this->file = $file;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.learning-file-card');
    }
}
