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
        $this->uri = null;

        $entryData = VisitUsComponents::find(4);

        if(!empty($entryData['data'][0]['text'])) {
            $this->uri = $entryData['data'][0]['text'];
        }
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
