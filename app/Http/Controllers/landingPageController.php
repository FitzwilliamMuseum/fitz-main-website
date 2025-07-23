<?php

namespace App\Http\Controllers;

use App\Models\LandingPageTemplate;

/** Temporary includes until the new visit us template goes live */
use App\Models\Stubs;
use App\Models\Directions;
use App\Models\CoronaVirusNotes;
use App\Models\Transport;
use App\Models\VisitUsComponents;
use App\Models\Exhibitions;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\FloorPlans;

class landingPageController extends Controller
{
    public static function injectPages(string $slug = ''): array
    {
        return LandingPageTemplate::getLanding($slug);
    }
    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function index($slug = '')
    {
        if(empty($slug)) {
            $slug = Route::getFacadeRoot()->current()->uri();
        }
        $page = LandingPageTemplate::getLanding($slug);
        if($slug == 'plan-your-visit') {
            // Temporary - Adds protection for first deployment
            // dd($page);
            if(isset($page['data'][0]['page_components'])) {
                return view('visit.index', [
                        'page' => Collect($page['data'])->first(),
                        'current' => Exhibitions::list()
                    ]
                );
            } else {
                return view('visit.index-old', [
                    'pages' => Stubs::visitUsLanding(),
                    'associated' => Stubs::visitUsAssociated(),
                    'directions' => Directions::list(),
                    'floors' => FloorPlans::list(),
                    'corona' => CoronaVirusNotes::list(),
                    'transport' => Transport::list(),
                    'measures' => VisitUsComponents::find(2),
                    'exhibition' => Exhibitions::tileVisit('current', 'tessitura_string', 1),
                    'display' => Exhibitions::tileDisplay('current',  1)
                ]);
            }
        }
        if (empty($page['data'])) {
            /**
             * If the page data is empty at first,
             * try and find the page in the "Stubs and Pages" collection
             * if it's not there, then throw the 404.
             * This is here because of the way the new landing page template works
             * Once all pages are using the new page template, we can remove this code.
             */
            $page = Stubs::getLanding($slug);
            if(empty($page['data'])) {
                return response()->view('errors.404', [], 404);
            } else {
                return view('pages.landing', [
                    'page' => Collect($page['data'])->first(),
                    'associated' => Stubs::getAssociated($slug)
                ]);
            }
        } else {
            return view('support.index', [
                    'page' => Collect($page['data'])->first(),
                    'floors' => FloorPlans::list(),
                ]
            );
        }
    }
}
