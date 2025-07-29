<?php

namespace App\Http\Controllers;

use App\Models\LandingPageTemplate;
use App\Models\Stubs;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class subpagesController extends Controller
{
    /**
     * @param string $slug
     * @return View|Response
     */
    public function index(string $slug): View|Response
    {
        $parent_page = LandingPageTemplate::getLanding();
        $page = LandingPageTemplate::getSubpage($slug);
        
        if (empty($page['data'])) {
            // Contingency for old visit us pages - not sure if this is the best approach, but it works for now
            if(str_contains($_SERVER['REQUEST_URI'], 'plan-your-visit')) {
                $page = Stubs::getPage('plan-your-visit', $slug);

                if(!empty($page['data'])) {
                    return view('pages.index', [
                            'page' => Collect($page['data'])->first()
                        ]
                    );
                } else {
                    return response()->view('errors.404', [], 404);
                }
            } else {
                return response()->view('errors.404', [], 404);
            }
        } else {
            return view('support.subpage', [
                'page' => Collect($page['data'])->first(),
                'parent_page' => Collect($parent_page['data'])->first()
            ]);
        }
    }
}
