<?php

namespace App\Http\Controllers;

use App\DirectUs;
use App\Models\CoronaVirusNotes;
use App\Models\Directions;
use App\Models\FloorPlans;
use App\Models\Transport;
use App\Models\Faqs;
use App\Models\VisitUsComponents;
use Illuminate\Contracts\View\View;

class visitController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $api = $this->getApi();
        $api->setEndpoint('stubs_and_pages');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[section][eq]' => 'visit-us',
                'filter[landing_page][null]' => '',
                'filter[associate_with_landing_page][eq]' => '1'
            )
        );
        $associated = $api->getData();

        $api2 = $this->getApi();
        $api2->setEndpoint('stubs_and_pages');
        $api2->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[section][eq]' => 'visit-us',
                'filter[landing_page][eq]' => '1',
            )
        );
        $pages = $api2->getData();
        $directions = Directions::list();
        $floors = FloorPlans::list();
        $corona = CoronaVirusNotes::list();
        $transport = Transport::list();
        $measures = VisitUsComponents::find(2);
        return view('visit.index', compact(
            'pages', 'associated', 'directions',
            'floors', 'corona', 'transport',
            'measures'
        ));
    }

    /**
     * @return View
     */
    public function faqs(): View
    {
        $booking = Faqs::list('booking');
        $hse = Faqs::list('hse');
        $visiting = Faqs::list('visit');
        return view('visit.faqs', compact('visiting', 'hse', 'booking'));
    }
}
