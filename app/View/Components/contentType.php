<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\SearchContentTypes;

class contentType extends Component
{
    public string $display;


    public function __construct(string $display)
    {
        $this->display = $display;
    }

    public function getDisplayName($string)
    {
        return SearchContentTypes::find($string)['display_name'];
    }

    public function render()
    {
        return view('components.content-type');
    }
}
