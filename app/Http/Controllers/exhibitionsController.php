<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Exhibitions;
use App\Models\Stubs;
use App\Models\FindMoreLikeThis;
use App\Models\CIIM;
use App\Models\PodcastArchive;
use App\Models\Cases;
use App\Models\Labels;
use Illuminate\Http\Response;

class exhibitionsController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $pages = Stubs::getLanding('exhibitions');
        $current = Exhibitions::list();
        $displays = Exhibitions::list('current', '-ticketed', 'display');
        $future = Exhibitions::listFuture();
        $archive = Exhibitions::archive('archived', '-exhibition_end_date', 3);
        return view('exhibitions.index', compact(
            'current', 'pages', 'archive',
            'future', 'displays'
        ));
    }

    /**
     * @return Application|Factory|View
     */
    public function archive()
    {
        $archive = Exhibitions::archive('archived', '-exhibition_end_date');
        return view('exhibitions.archives', compact('archive'));
    }

    /**
     * @param string $slug
     * @return Application|Factory|View|Response
     */
    public function details(string $slug)
    {
        $exhibitions = Exhibitions::find($slug);
        $adlib = NULL;
        if (!empty($exhibitions['data'])) {
            $adlib = CIIM::findByExhibition($exhibitions['data'][0]['adlib_id_exhibition']);
        }
        $records = FindMoreLikeThis::find($slug, 'exhibitions');
        $podcasts = NULL;
        $cases = NULL;
        if (!empty($exhibitions['data'][0]['podcasts'])) {
            $podcasts = PodcastArchive::find($exhibitions['data'][0]['podcasts'][0]['podcast_series_id']['id']);
        }
        if (!empty($exhibitions['data'][0]['id'])) {
            $cases = Cases::list($exhibitions['data'][0]['id']);
        }
        if (empty($exhibitions['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('exhibitions.details', compact('exhibitions', 'records', 'adlib', 'podcasts', 'cases'));
    }

    public function labels(Request $request)
    {
        $labels = Labels::list($request->segment(5));
        $title = str_replace('-', ' ', $request->segment(5));
        $paginator = Cases::paginator($request);
        return view('exhibitions.labels', compact('labels', 'title', 'paginator'));
    }

    /**
     * @param string $slug
     * @return Application|Factory|View
     */
    public function label(string $slug)
    {
        $labels = Labels::find($slug);
        $records = FindMoreLikeThis::find($slug, 'highlights');
        return view('exhibitions.label', compact('labels', 'records'));
    }

    /**
     * @param string $slug
     * @return View
     */
    public function cases(string $slug): View
    {
        $cases = Cases::find($slug);

        return view('exhibitions.cases', compact('cases'));
    }

    /**
     * @return array
     */
    public static function injectImmunity(): array
    {
        return Exhibitions::immunity();
    }

    /**
     * @return array
     */
    public static function injectLoanImmunity(): array
    {
        return Exhibitions::loanImmunity();
    }
}
