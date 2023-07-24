<?php

namespace App\Http\Controllers;

use App\Models\CoronaVirusNotes;
use App\Models\Directions;
use App\Models\FindMoreLikeThis;
use App\Models\FloorPlans;
use App\Models\Transport;
use App\Models\Faqs;
use App\Models\Galleries;
use App\Models\Exhibitions;
use App\Models\HomePageBanner;
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
        return view('visit.index', [
                'pages' => Stubs::visitUsLanding(),
                'associated' => Stubs::visitUsAssociated(),
                'directions' => Directions::list(),
                'floors' => FloorPlans::list(),
                'corona' => CoronaVirusNotes::list(),
                'transport' => Transport::list(),
                'measures' => VisitUsComponents::find(2),
                'exhibition' => Exhibitions::tileVisit('current', 'tessitura_string', 1),
                'display' => Exhibitions::tileDisplay('current',  1),
//            'gallery' => ,
//            'events' => ,
            ]
        );
    }

    /**
     * @return View
     */
    public function faqs(): View
    {
        return view('visit.faqs', [
            'visiting' => Faqs::list('visit'),
            'hse' => Faqs::list('hse'),
            'booking' => Faqs::list('booking'),
            'records' => FindMoreLikeThis::find('frequently-asked-questions', 'pages'),
        ]);
    }
}
