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
    public function index(string $slug): View|Response
    {
        $page = LandingPageTemplate::getSubpage($slug);
        if (empty($page['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('support.index', [
                'page' => Collect($page['data'])->first()
            ]);
        }
    }
}
