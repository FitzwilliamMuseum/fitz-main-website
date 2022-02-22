<?php

namespace App\View\Components;

use Illuminate\View\Component;

class twitterCard extends Component
{
    public $tweet;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $tweet)
    {
        $this->tweet = $tweet;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.twitter-card');
    }
}
