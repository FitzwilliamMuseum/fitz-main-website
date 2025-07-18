<?php

namespace App\Http\Controllers;

use App\Models\LandingPageTemplate;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class landingPageController extends Controller
{
    /**
     * @return View
     */
    public function index($slug = '')
    {
        if(empty($slug)) {
            $slug = Route::getFacadeRoot()->current()->uri();
        }
        $page = LandingPageTemplate::getLanding($slug);
        if($slug == 'plan-your-visit') {
            return view('visit.index', [
                    'page' => Collect($page['data'])->first(),
                ]
            );
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
