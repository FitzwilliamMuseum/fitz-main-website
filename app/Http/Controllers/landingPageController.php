<?php

namespace App\Http\Controllers;

use App\Models\LandingPageTemplate;
use App\Models\Stubs;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

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
    public function index(string $slug): View|Response
    {
        $page = LandingPageTemplate::getLanding($slug);
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
                    'page' => Collect($page['data'])->first()
                ]
            );
        }
    }
}
