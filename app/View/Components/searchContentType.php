<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

use App\Models\SearchContentTypes;

class searchContentType extends Component
{
    public string $type;
    public string $display;

    /**
     * Create a new component instance.
     *
     * @param $type
     * @param  $display
     */
    public function __construct($type, $display)
    {
        $this->type = $type;
        if(isset($display)) {
            $this->display = $this->getDisplayName($type);
        } else {
            $this->display = $type;
        }
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
