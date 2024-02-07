<?php

namespace App\Http\Controllers;

use App\Models\LandingPageTemplate;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class landingPageController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $page = LandingPageTemplate::getLanding();
        return view('support.index', [
                'page' => Collect($page['data'])->first()
            ]
        );
    }
}
