<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\SearchContentTypes;

class searchContentType extends Component
{
    public string $type;
    public string $displayName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( string $type)
    {
        $this->type = $type;
        $this->displayName = SearchContentTypes::find($type)['display_name'] ?? 'No type found';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.search-content-type');
    }
}
