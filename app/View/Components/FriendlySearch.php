<?php

namespace App\View\Components;

use App\Models\SearchContentTypes;
use Illuminate\View\Component;

class FriendlySearch extends Component
{
    public string $name;
    public string $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->title = $this->titleString();
    }

    public function titleString(): string
    {
        return SearchContentTypes::find($this->name)['display_name'];

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.friendly-search');
    }
}
