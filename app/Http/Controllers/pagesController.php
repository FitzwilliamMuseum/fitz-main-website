<?php

namespace App\Http\Controllers;

use App\Models\FindMoreLikeThis;
use App\Models\Promopage;
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
    public function index(string $section, string $slug): View | Response
    {
        $page = Stubs::getPage($section, $slug);
        if (empty($page['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            return view('pages.index', [
                'page' => Collect($page['data'])->first(),
                'records' => FindMoreLikeThis::find($slug, 'pages'),
            ]
            );
        }
    }

    /**
     * @param string $section
     * @return View|Response
     */
    public function landing(string $section): View | Response
    {
        $page = Stubs::getLanding($section);
        $promoPage = Promopage::getSubpage($section);

        if (empty($page['data']) && empty($promoPage['data'])) {
            return response()->view('errors.404', [], 404);
        }

        if (!empty($page['data'])) {
            return view('pages.landing', [
                'page' => Collect($page['data'])->first(),
                'associated' => Stubs::getAssociated($section),
            ]);
        }

        if (!empty($promoPage['data'])) {
            return view('promopage.subpage', [
                'page' => Collect($promoPage['data'])->first(),
            ]);
        }

    }
}
