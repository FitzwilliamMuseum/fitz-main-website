<?php

namespace App\View\Components;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class wordpressCard extends Component
{

    public $title;
    public $image;
    public $url;

    /**
     * @param string $title
     * @param string|NULL $image
     * @param string|NULL $url
     */
    public function __construct(string $title, string $image = NULL, string $url = NULL)
    {
        $this->title = $title;
        $this->image = $image;
        $this->url = $url;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.wordpress-card');
    }
}
