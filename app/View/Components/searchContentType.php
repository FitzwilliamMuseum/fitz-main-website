<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

use App\Models\SearchContentTypes;

class searchContentType extends Component
{
    public string $type;
    public string $display_name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type)
    {
        $this->type = $type;
        $this->display_name = $this->getDisplayName();
    }

    public function getDisplayName(): string
    {
        return SearchContentTypes::find($this->type)['display_name'] ?? 'No type found';
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
