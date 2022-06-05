<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\SearchContentTypes;

class contentType extends Component
{
    public string $display;


    public function __construct(string $display)
    {
        $this->display = $display;
    }

    public function getDisplayName()
    {
        return SearchContentTypes::find($this->display)['display_name'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.content-type');
    }
}
