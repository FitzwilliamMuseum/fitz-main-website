<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class partnerCard extends Component
{

    /**
     * @var string
     */
    public $title;
    public $altTag;
    public $image;
    public $url;
    public $subtitle;

    /**
     * @param string $title
     * @param string|NULL $altTag
     * @param array|NULL $image
     * @param $url
     * @param $subtitle
     */
    public function __construct(string $title, string $altTag = NULL, array $image = NULL, $url = NULL, $subtitle = NULL)
    {
        $this->title = $title;
        $this->altTag = $altTag;
        $this->image = $image;
        $this->url = $url;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.partner-card');
    }
}
