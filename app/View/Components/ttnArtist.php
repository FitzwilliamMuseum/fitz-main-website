<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ttnArtist extends Component
{
    public array $artists;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $artists)
    {
        $this->artists = $artists;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ttn-artist');
    }
}
