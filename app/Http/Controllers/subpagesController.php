<?php

namespace App\Http\Controllers;

use App\Models\LandingPageTemplate;
use App\Models\Subpages;

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
        $page = Subpages::getSubpage($slug);
        if (empty($page['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('support.subpage', [
                'page' => Collect($page['data'])->first(),
                'parent_page' => Collect($parent_page['data'])->first()
            ]);
        }
    }
}
