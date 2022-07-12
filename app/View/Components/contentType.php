<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\SearchContentTypes;
use Illuminate\Contracts\View\View;

class contentType extends Component
{
    /**
     * @var string
     */
    public string $display;

    /**
     * @param string $display
     */
    public function __construct(string $display)
    {
        $this->display = $display;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @param $string
     * @return string
     */
    public function showDisplayName($string): string
    {
        return SearchContentTypes::find($string)['display_name'];
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.content-type');
    }

    /**
     * @return string
     */
    public function test(): string
    {
        return 'test';
    }
}
