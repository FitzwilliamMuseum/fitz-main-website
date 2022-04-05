<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ttnArtistDetail extends Component
{
    public array $artist;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $artist)
    {
        $this->artist = $artist;//
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.ttn-artist-detail');
    }
}
