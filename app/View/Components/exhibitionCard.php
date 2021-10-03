<?php

namespace App\View\Components;

use Illuminate\View\Component;

class exhibitionCard extends Component
{

    public $path;
    public $title;
    public $altTag;
    public $params;
    public $image;
    public $route;
    public $startDate;
    public $endDate;
    public $ticketed;
    public $status;
    public $tessitura;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
      string $route, array $params, string $title,
      string $altTag = NULL, array $image = NULL,
      $startDate = NULL, $endDate = NULL, $ticketed  = NULL,
      $status = 'current', $tessitura = NULL
      )
    {
        $this->route = $route;
        $this->params = $params;
        $this->title = $title;
        $this->altTag = $altTag;
        $this->image = $image;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->ticketed = $ticketed;
        $this->status = $status;
        $this->tessitura = $tessitura;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.exhibition-card');
    }
}
