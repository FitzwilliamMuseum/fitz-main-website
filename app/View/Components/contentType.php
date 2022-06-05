<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\SearchContentTypes;

class contentType extends Component
{
    public string $display;
    public string $name;


    public function __construct(string $display)
    {
        $this->display = $display;
        $this->name = SearchContentTypes::find($this->display)['display_name'];
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
