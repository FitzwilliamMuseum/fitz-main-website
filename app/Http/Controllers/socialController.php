<?php

namespace App\Http\Controllers;

use App\Models\CIIM;
use App\Models\Instagram;
use App\TwitterSearch;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class socialController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('social.index');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function instagram(Request $request): View
    {
        $paginator = Instagram::list($request);
        $insta = $paginator->items();
        return view('social.insta', compact('insta', 'paginator'));
    }

    /**
     * @param string $slug
     * @return View
     */
    public function story(string $slug): View
    {
        $insta = Instagram::find($slug);
        $adlib = CIIM::findByAccession($insta['data'][0]['adlib_id']);
        return view('social.story', compact('insta', 'adlib'));
    }

    /**
     * @return View
     */
    public function twitter(): View
    {
        $tweets = TwitterSearch::getTimeLine();
        return view('social.twitter', compact('tweets'));
    }

}
