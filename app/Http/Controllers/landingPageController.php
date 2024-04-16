<?php

namespace App\Http\Controllers;

use App\Models\LandingPageTemplate;

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
            return response()->view('errors.404', [], 404);
        } else {
            return view('support.index', [
                    'page' => Collect($page['data'])->first()
                ]
            );
        }
    }
}
