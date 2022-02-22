<?php

namespace App\Http\Controllers;

use App\Models\AssociatedPeople;
use App\Models\CIIM;
use App\Models\FindMoreLikeThis;
use App\Models\MindsEye;
use App\Models\PodcastArchive;
use App\Models\PodcastSeries;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Psr\SimpleCache\InvalidArgumentException;

class podcastsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $podcasts = PodcastSeries::list();
        return view('podcasts.index', compact('podcasts'));
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function series(string $slug): View|Response
    {
        $ids = PodcastSeries::getSeriesID($slug);
        if (empty($ids['data'])) {
            return response()->view('errors.404', [], 404);
        }
        $podcasts = PodcastArchive::find($ids['data'][0]['id']);
        $suggest = FindMoreLikeThis::find($slug, 'podcast_series');
        return view('podcasts.series', compact('podcasts', 'ids', 'suggest'));
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function episode(string $slug): View|Response
    {
        $podcasts = PodcastArchive::findByEpisode($slug);
        if (empty($podcasts['data'])) {
            return response()->view('errors.404', [], 404);
        }
        $adlib = CIIM::findByAccession($podcasts['data'][0]['adlib_id']);
        $suggest = FindMoreLikeThis::find($slug, 'podcasts');
        return view('podcasts.episode', compact('podcasts', 'suggest', 'adlib'));
    }

    /**
     * @param Request $request
     * @return View
     */
    public function mindseyes(Request $request): View
    {
        $mindseyes = MindsEye::list($request);
        return view('podcasts.mindseyes', compact('mindseyes'));
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function mindseye(string $slug): View|Response
    {
        $mindseye = MindsEye::find($slug);
        $adlib = CIIM::findByAccession($mindseye['data'][0]['adlib_id']);
        $suggest = FindMoreLikeThis::find($slug, 'podcasts');
        if (empty($mindseye['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('podcasts.mindseye', compact('mindseye', 'adlib', 'suggest'));
    }

    /**
     * @param string $slug
     * @return View|Response
     */
    public function presenter(string $slug): View|Response
    {
        $profiles = AssociatedPeople::find($slug);
        if (empty($profiles['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('podcasts.presenter', compact('profiles'));
    }

    /**
     * @return View|Response
     */
    public function presenters(): View|Response
    {
        $profiles = AssociatedPeople::list();
        if (empty($profiles['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('podcasts.presenters', compact('profiles'));
    }
}
