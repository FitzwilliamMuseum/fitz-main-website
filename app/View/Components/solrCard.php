<?php

namespace App\View\Components;

use Illuminate\View\Component;

class solrCard extends Component
{

    public $result;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($result)
    {
        $this->result = $result;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.solr-card');
    }
}
