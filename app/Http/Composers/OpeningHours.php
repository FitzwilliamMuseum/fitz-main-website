<?php

namespace App\Http\Composers;

use App\Models\VisitUsComponents;
use Illuminate\Contracts\View\View;

class OpeningHours
{
    /**
     * @var mixed
     */
    private $message;

    /**
     *
     */
    public function __construct()
    {
        $this->message = VisitUsComponents::find(3)['data'][0]['text'];
    }

    /**
     * @param View $view
     * @return View
     */
    public function compose(View $view): View
    {
        return $view->with('openingMessage', $this->message);
    }

}
