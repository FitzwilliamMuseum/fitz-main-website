<?php

namespace App\Http\Controllers;

use App\Models\CoronaVirusNotes;
use App\Models\Directions;
use App\Models\FloorPlans;
use App\Models\Transport;
use App\Models\Faqs;
use App\Models\Stubs;
use App\Models\VisitUsComponents;
use Illuminate\Contracts\View\View;

class visitController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $associated = Stubs::visitUsAssociated();
        $pages = Stubs::visitUsLanding();
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
