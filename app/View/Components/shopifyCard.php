<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class shopifyCard extends Component
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
     * @return View
     */
    public function render(): View
    {
        return view('components.shopify-card');
    }
}
