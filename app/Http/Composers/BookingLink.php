<?php

namespace App\Http\Composers;

use App\Models\VisitUsComponents;
use Illuminate\Contracts\View\View;

class BookingLink
{
    /**
     * @var mixed
     */
    private $uri;

    /**
     *
     */
    public function __construct()
    {
        $this->uri = VisitUsComponents::find(4)['data'][0]['text'];
    }

    /**
     * @param View $view
     * @return View
     */
    public function compose(View $view): View
    {
        return $view->with('bookingLink', $this->uri);
    }

}
