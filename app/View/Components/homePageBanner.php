<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class homePageBanner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( public array $banners)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.home-page-banner');
    }
}
