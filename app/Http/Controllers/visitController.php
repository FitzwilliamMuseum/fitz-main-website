<?php

namespace App\Http\Controllers;

use App\Models\CoronaVirusNotes;
use App\Models\Directions;
use App\Models\FindMoreLikeThis;
use App\Models\FloorPlans;
use App\Models\GroupVisits;
use App\Models\Transport;
use App\Models\Faqs;
use App\Models\Galleries;
use App\Models\Exhibitions;
use App\Models\HomePageBanner;
use App\Models\Stubs;
use App\Models\VisitUsComponents;

use App\Models\LandingPageTemplate;
use App\Models\Subpages;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

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
     * 
     * @param string $slug
     * @return View
     * 
     * This function looks for a subpage from the 'Subpages' collection in Directus
     * first, then looks for a subpage from the 'Stubs and Pages' collection in Directus
     * if a page in the 'Subpages' collection couldn't be found.
     * 
     */
    
    public function getSubpage(string $slug) : View|Response
    {
        $parent_page = LandingPageTemplate::getLanding('plan-your-visit');
        $subpage = Subpages::getSubpage($slug);
        $stubs_page = Stubs::getPage('plan-your-visit', $slug);

        // First, check the subpages collection
        if(!empty($subpage['data'])) {
            return view('support.subpage', [
                'page' => Collect($subpage['data'])->first(),
                'parent_page' => Collect($parent_page['data'])->first()
            ]);
        }
        // If that fails, then check the pages collection 
        else {
            if(empty($subpage['data'] && !empty($stubs_page['data']))) {
                return view('pages.index', [
                    'page' => Collect($stubs_page['data'])->first()
                    ]
                );
            }
            return response()->view('errors.404', [], 404);
        }
    }

    /**
     * @return View
     */
    public function groupVisits(): View|Response
    {
        $page = Stubs::getPage('plan-your-visit', 'group-visits');

        return view('pages.index', [
                'page' => Collect($page['data'])->first(),
                'records' => FindMoreLikeThis::find('group-visits', 'pages'),
                'group_visits' => GroupVisits::list()
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
