<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class governanceCard extends Component
{
    public $title;
    public $altTag;
    public $image;
    public $file;
    public $type;

    /**
     * @param string $title
     * @param string|NULL $altTag
     * @param array|NULL $image
     * @param $file
     * @param $type
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
     * @return View
     */
    public function render(): View
    {
        return view('components.governance-card');
    }
}
