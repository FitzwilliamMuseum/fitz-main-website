<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\SearchContentTypes;

class ContentType extends Component
{
    public string $display;
    public string $name;


    public function __construct(string $display)
    {
        $this->display = $display;
        $this->name = SearchContentTypes::find($this->display)['display_name'];
    }

    public function render()
    {
        return view('components.content-type');
    }
}
