<?php

namespace App\Http\Controllers;
use App\Models\FindMoreLikeThis;
use App\Models\Stubs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Psr\SimpleCache\InvalidArgumentException;

class pagesController extends Controller
{
    /**
     * @param string $section
     * @param string $slug
     * @return array
     */
    public static function injectPages(string $section = '', string $slug = ''): array
    {
        return Stubs::getPage($section, $slug);
    }

    /**
     * @param string $section
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function index(string $section, string $slug): View|Response
    {
        $pages = Stubs::getPage($section, $slug);
        $records = FindMoreLikeThis::find($slug, 'pages');
        if (empty($pages['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('pages.index', compact('pages', 'records'));
    }

    /**
     * @param string $section
     * @return View|Response
     */
    public function landing(string $section): View|Response
    {
        $pages = Stubs::getLanding($section);
        $associated = Stubs::getAssociated($section);
        if (empty($pages['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('pages.landing', compact('pages', 'associated'));
    }
}
