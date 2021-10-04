<?php

namespace App\View\Components;

use Illuminate\View\Component;

class governanceCard extends Component
{
    public $title;
    public $altTag;
    public $image;
    public $file;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $altTag = NULL, array $image = NULL, $file = NULL, $type = NULL)
    {

        $this->title = $title;
        $this->altTag = $altTag;
        $this->image = $image;
        $this->file = $file;
        $this->type = $type;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.governance-card');
    }
}
