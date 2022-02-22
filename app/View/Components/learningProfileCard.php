<?php

namespace App\View\Components;

use Illuminate\View\Component;

class learningProfileCard extends Component
{
    public $profile;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.learning-profile-card');
    }
}
