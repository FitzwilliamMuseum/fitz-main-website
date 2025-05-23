<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class exhibitionCard extends Component
{

    public $path;
    public $title;
    public $altTag;
    public $headingLevel;
    public $params;
    public $image;
    public $listingImage;
    public $listingImageAlt;
    public $route;
    public $startDate;
    public $endDate;
    public $displayEndDate;
    public $ticketed;
    public $status;
    public $source;
    public $tessitura;
    public $copyright;

    /**
     * @param string $route
     * @param array $params
     * @param string $title
     * @param string $headingLevel
     * @param string|NULL $altTag
     * @param array|NULL $image
     * @param array|NULL $listingImage
     * @param string|NULL $listingImageAlt
     * @param $startDate
     * @param $endDate
     * @param $ticketed
     * @param string $status
     * @param string|NULL $source
     * @param $tessitura
     * @param string|null $copyright;
     */

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct(
        string $route, array $params, string $title,
        string $altTag = NULL, string $headingLevel = NULL, array $image = NULL, array $listingImage = NULL, string $listingImageAlt = NULL,
        $displayEndDate = NULL, $startDate = NULL, $endDate = NULL, $ticketed = NULL,
        string $status = 'current', $source = NULL, $tessitura = NULL, string $copyright = NULL
    )
    {
        $this->route = $route;
        $this->params = $params;
        $this->title = $title;
        $this->altTag = $altTag;
        $this->headingLevel = $headingLevel;
        $this->image = $image;
        $this->listingImage = $listingImage;
        $this->listingImageAlt = $listingImageAlt;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->displayEndDate = $displayEndDate;
        $this->ticketed = $ticketed;
        $this->status = $status;
        $this->source = $source;
        $this->tessitura = $tessitura;
        $this->copyright = $copyright;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.exhibition-card');
    }
}
