<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

use App\Models\SearchContentTypes;

class searchContentType extends Component
{
    public string $type;

    /**
     * Create a new component instance.
     *
     * @param $type
     */
    public function __construct($type)
    {
        $this->type = $this->getDisplayName($type);
    }

    public function getDisplayName(string $type): string
    {
        return SearchContentTypes::find($type)['display_name'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.search-content-type');
    }
}
