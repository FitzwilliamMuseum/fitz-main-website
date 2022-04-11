<?php

namespace App\Http\Controllers;

use App\Models\Shopify;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Exhibitions;
use App\Models\Stubs;
use App\Models\FindMoreLikeThis;
use App\Models\CIIM;
use App\Models\PodcastArchive;
use App\Models\Cases;
use App\Models\AssociatedPeople;
use App\Models\Labels;
use App\Models\TtnBios;
use App\Models\TtnLabels;
use Illuminate\Http\Response;
use Psr\SimpleCache\InvalidArgumentException;

class exhibitionsController extends Controller
{

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

    /**
     * @return View
     */
    public function index(): View
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
     * @return View
     */
    public function archive(): View
    {
        $archive = Exhibitions::archive('archived', '-exhibition_end_date');
        return view('exhibitions.archives', compact('archive'));
    }

    /**
     * @param string $slug
     * @return View|Response
     * @throws InvalidArgumentException
     */
    public function details(string $slug): View|Response
    {
        $exhibitions = Exhibitions::find($slug);
        $adlib = NULL;
        if (!empty($exhibitions['data'])) {
            $adlib = CIIM::findByExhibition($exhibitions['data'][0]['adlib_id_exhibition']);
        }
        $records = FindMoreLikeThis::find($slug, 'exhibitions');
        $podcasts = NULL;
        $cases = NULL;
        $products = NULL;
        if (!empty($exhibitions['data'][0]['podcasts'])) {
            $podcasts = PodcastArchive::find($exhibitions['data'][0]['podcasts'][0]['podcast_series_id']['id']);
        }
        if (!empty($exhibitions['data'][0]['id'])) {
            $cases = Cases::list($exhibitions['data'][0]['id']);
        }
        if (!empty($exhibitions['data'][0]['fme_product_ids'])) {
            $products = Shopify::getShopifyCollection($exhibitions['data'][0]['fme_product_ids']);
        }
        if (empty($exhibitions['data'])) {
            return response()->view('errors.404', [], 404);
        }
        return view('exhibitions.details', compact('exhibitions', 'records', 'adlib', 'podcasts', 'cases', 'products'));
    }

    /**
     * @param Request $request
     * @return View
     */
    public function labels(Request $request): View
    {
        $labels = Labels::list($request->segment(5));
        $title = str_replace('-', ' ', $request->segment(5));
        $paginator = Cases::paginator($request);
        return view('exhibitions.labels', compact('labels', 'title', 'paginator'));
    }

    /**
     * @param string $slug
     * @return View
     * @throws InvalidArgumentException
     */
    public function label(string $slug): View
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
     * @param string $slug
     * @return Response
     */
    public function externals(string $slug): View|Response
    {
        $external = AssociatedPeople::find($slug);

        if (empty($external['data'])) {
            return response()->view('errors.404', [], 404);
        }
        $exhibitions = Exhibitions::findByExternals($external['data'][0]['id'])['data'];
        return view('exhibitions.externals', compact('external', 'exhibitions'));
    }

    /**
     * @return View
     */
    public function ttnArtists(): View
    {
        $artists = TtnBios::list()['data'];
        return view('exhibitions.ttn-artists', compact('artists'));
    }

    /**
     * @return View
     */
    public function ttnArtist(string $slug): View
    {
        $artists = TtnBios::find($slug)['data'];
        $works = TtnLabels::byArtist($artists[0]['id'])['data'];
        $records = FindMoreLikeThis::find($slug, 'ttnArtists');

        return view('exhibitions.ttn-artist', compact('artists', 'works','records'));
    }

    /**
     * @return View
     */
    public function ttnLabels(): View
    {
        $labels = TtnLabels::list()['data'];
        return view('exhibitions.ttn-labels', compact('labels'));
    }

    /**
     * @param string $slug
     * @return View
     */
    public function ttnLabel(string $slug): View
    {
        $label = TtnLabels::find($slug)['data'];
        $records = FindMoreLikeThis::find($slug, 'ttnLabels');
        return view('exhibitions.ttn-label', compact('label', 'records'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ttnGeoJson()
    {
        $labels = TtnLabels::list()['data'];
        $geoJson = array(
            'type' => 'FeatureCollection',
            'features' => array()
        );

        foreach ($labels as $label) {
            if (isset($label['lng'])) {
                $feature = array(
                    'id' => $label['id'],
                    'type' => 'Feature',
                    'geometry' => array(
                        'type' => 'Point',
                        # Pass Longitude and Latitude Columns here
                        'coordinates' => array($label['lng'], $label['lat'])
                    ),
                    # Pass other attribute columns here
                    'properties' => array(
                        'title' => $label['title'],
                        'artist' => $label['artist']['display_name'] ?? 'Not known',
                        'slug' => $label['slug'],
                        'image' => $label ['image']['data']['thumbnails'][7]['url']
                    )
                );
                $geoJson['features'][] = $feature;
            }
        }
        return response()->json($geoJson);
    }

    public function ttnMap(): View
    {
        return view('exhibitions.ttn-map');
    }

}
