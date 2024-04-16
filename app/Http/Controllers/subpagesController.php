<?php

namespace App\Http\Controllers;

use App\Models\LandingPageTemplate;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class subpagesController extends Controller
{
    /**
     * @param string $slug
     * @return View|Response
     */
    public function index(string $parent_page, string $slug): View|Response
    {
        $parent = LandingPageTemplate::getLanding($parent_page);
        $page = LandingPageTemplate::getSubpage($slug);
        if (empty($page['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('support.subpage', [
                'page' => Collect($page['data'])->first(),
                'parent_page' => Collect($parent['data'])->first()
            ]);
        }
    }
}
