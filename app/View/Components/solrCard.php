<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class solrCard extends Component
{

    public $result;

    /**
     * @param $result
     */
    public function __construct($result)
    {
        $this->result = $result;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.solr-card');
    }
}
