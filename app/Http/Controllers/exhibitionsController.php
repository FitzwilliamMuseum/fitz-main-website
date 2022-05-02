<?php

namespace App\Http\Controllers;

use App\Models\Shopify;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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
use App\Models\TtnViewpoints;
use App\Models\TessituraPerformances;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

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
        $pages    = Stubs::getLanding('exhibitions');
        $current  = Exhibitions::list();
        $displays = Exhibitions::list('current', '-ticketed', 'display');
        $future   = Exhibitions::listFuture();
        $archive  = Exhibitions::archive('archived', '-exhibition_end_date', 3);
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
        $events = NULL;
        if (!empty($exhibitions['data'][0]['podcasts'])) {
            $podcasts = PodcastArchive::find($exhibitions['data'][0]['podcasts'][0]['podcast_series_id']['id']);
        }
        if (!empty($exhibitions['data'][0]['id'])) {
            $cases = Cases::list($exhibitions['data'][0]['id']);
        }
        if (!empty($exhibitions['data'][0]['fme_product_ids'])) {
            $products = Shopify::getShopifyCollection($exhibitions['data'][0]['fme_product_ids']);
        }
        if (!empty($exhibitions['data'][0]['tessitura_keyword_id'])) {
            $events = TessituraPerformances::getExhibitionPerformances($exhibitions['data'][0]['tessitura_keyword_id']);
        }
        if (empty($exhibitions['data'])) {
            return response()->view('errors.404', [], 404);
        }

        return view('exhibitions.details', compact('exhibitions', 'records', 'adlib', 'podcasts', 'cases', 'products', 'events'));
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
     * @return View|Response
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
        return view('exhibitions.ttn-artist', compact('artists', 'works', 'records'));
    }

    /**
     * @return View
     */
    public function ttnLabels(): View
    {
        $one = TtnLabels::listByTheme(1)['data'];
        $two = TtnLabels::listByTheme(2)['data'];
        $three = TtnLabels::listByTheme(3)['data'];
        $four = TtnLabels::listByTheme(4)['data'];
        $five = TtnLabels::listByTheme(5)['data'];
        $six = TtnLabels::listByTheme(6)['data'];
        $seven = TtnLabels::listByTheme(7)['data'];
        $eight = TtnLabels::listByTheme(8)['data'];
        $nine = TtnLabels::listByTheme(9)['data'];
        $ten = TtnLabels::listByTheme(10)['data'];
        return view('exhibitions.ttn-labels', compact(
            'one', 'two', 'three',
            'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'
        ));
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
     * @return JsonResponse
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

    public function linkedPasts()
    {
        $labels = TtnLabels::listFiltered('lat')['data'];
        $geoJson = array(
            "@id" => "https://fitz.ms/ttnlabels",
            "type" => "FeatureCollection",
            "@context" => "https://fitzmuseum.cam.ac.uk/visit-us/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/geojson.ld",
            'features' => array(),
            'indexing' => array(
                "@context" => "https://schema.org/",
                "@type" => "Dataset",
                "name" => "True to Nature",
                "description" => "True to Nature labels",
                "creator" => array(
                    "@type" => "Person",
                    "name" => "Daniel Pett",
                    "url" => "https://orcid.org/0000-0002-0246-2335"
                ),
                "license" => "https://creativecommons.org/licenses/by/4.0/",
                "identifier" => "https://fitz.ms/ttnlabels",
                "temporalCoverage" => "1780/1870",
                'spatialCoverage' => array(
                    "@type" => "Place",
                    "geoCoveredBy" => array(
                        "@type" => "DefinedRegion",
                        "addressCountry" => "GB"
                    )
                )
            )
        );
        foreach ($labels as $label) {
            $feature = array(
                "type" => "Feature",
                "@id" =>  route('exhibition.ttn.label', $label['slug']),
                'properties' => array(
                    'title' => $label['title'],
                    'artist' => $label['artist']['display_name'] ?? 'Not known',
                    'slug' => $label['slug'],
                ),
                'depictions' => array(
                    array(
                    'license' => 'cc:by-sa/3.0/',
                    'thumbnail' => $label ['image']['data']['url'],
                    '@id' => $label ['image']['data']['url']
                    )
                ),
                'geometry' => array(
                    "type" =>  "Point",
                    "coordinates" => array(
                        $label['lng'], $label['lat']
                    ),
                    "certainty" => "certain"
                )

            );
            $geoJson['features'][] = $feature;
        }
        return response()->json($geoJson);
    }


    public function linkedPastsBirths()
    {
        $labels = TtnBios::listFiltered('birth_lat')['data'];
        $geoJson = array(
            "@id" => "https://fitz.ms/ttnBirths",
            "type" => "FeatureCollection",
            "@context" => "https://fitzmuseum.cam.ac.uk/visit-us/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/geojson.ld",
            'features' => array(),
            'indexing' => array(
                "@context" => "https://schema.org/",
                "@type" => "Dataset",
                "name" => "True to Nature",
                "description" => "True to Nature labels",
                "creator" => array(
                    "@type" => "Person",
                    "name" => "Daniel Pett",
                    "url" => "https://orcid.org/0000-0002-0246-2335"
                ),
                "license" => "https://creativecommons.org/licenses/by/4.0/",
                "identifier" => "https://fitz.ms/ttnlabels",
                "temporalCoverage" => "1780/1870",
                'spatialCoverage' => array(
                    "@type" => "Place",
                    "geoCoveredBy" => array(
                        "@type" => "DefinedRegion",
                        "addressCountry" => "GB"
                    )
                )
            )
        );
        foreach ($labels as $label) {
            $feature = array(
                "type" => "Feature",
                "@id" =>  route('exhibition.ttn.artist', $label['slug']),
                'properties' => array(
                    'title' => $label['display_name'] ?? 'Not known',
                    'slug' => $label['slug'],
                ),
                'depictions' => array(
                        array(

                        'license' => 'cc:by-sa/3.0/',
                        'thumbnail' => $label['image']['data']['thumbnails'][7]['url'] ?? '',
                        '@id' => $label ['image']['data']['thumbnails'][7]['url'] ?? ''
                    ),
                ),
                'geometry' => array(
                    "type" =>  "Point",
                    "coordinates" => array(
                        $label['birth_lon'], $label['birth_lat']
                    ),
                    "certainty" => "certain"
                )

            );
            $geoJson['features'][] = $feature;
        }
        return response()->json($geoJson);
    }

    public function linkedPastsDeaths()
    {
        $labels = TtnBios::listFiltered('death_lon')['data'];
        $geoJson = array(
            "@id" => "https://fitz.ms/ttnBirths",
            "type" => "FeatureCollection",
            "@context" => "https://fitzmuseum.cam.ac.uk/visit-us/exhibitions/true-to-nature-open-air-painting-in-europe-1780-1870/geojson.ld",
            'features' => array(),
            'indexing' => array(
                "@context" => "https://schema.org/",
                "@type" => "Dataset",
                "name" => "True to Nature",
                "description" => "True to Nature labels",
                "creator" => array(
                    "@type" => "Person",
                    "name" => "Daniel Pett",
                    "url" => "https://orcid.org/0000-0002-0246-2335"
                ),
                "license" => "https://creativecommons.org/licenses/by/4.0/",
                "identifier" => "https://fitz.ms/ttnlabels",
                "temporalCoverage" => "1780/1870",
                'spatialCoverage' => array(
                    "@type" => "Place",
                    "geoCoveredBy" => array(
                        "@type" => "DefinedRegion",
                        "addressCountry" => "GB"
                    )
                )
            )
        );
        foreach ($labels as $label) {
            $feature = array(
                "type" => "Feature",
                "@id" =>  route('exhibition.ttn.artist', $label['slug']),
                'properties' => array(
                    'title' => $label['display_name'] ?? 'Not known',
                    'slug' => $label['slug'],
                ),
                'depictions' => array(
                    array(

                        'license' => 'cc:by-sa/3.0/',
                        'thumbnail' => $label['image']['data']['thumbnails'][7]['url'] ?? '',
                        '@id' => $label ['image']['data']['thumbnails'][7]['url'] ?? ''
                    ),
                ),
                'geometry' => array(
                    "type" =>  "Point",
                    "coordinates" => array(
                        $label['death_lon'], $label['death_lat']
                    ),
                    "certainty" => "certain"
                )

            );
            $geoJson['features'][] = $feature;
        }
        return response()->json($geoJson);
    }
    /**
     * @return View
     */
    public function ttnMap(): View
    {
        return view('exhibitions.peripleo-ttn');
    }

    /**
     * @return View
     */
    public function ttnViewpoints(): View
    {
        $viewpoints = TtnViewpoints::list();
        return view('exhibitions.ttn-viewpoints', compact('viewpoints'));
    }

    /**
     * @param string $id
     * @return View
     * @throws InvalidArgumentException
     */
    public function ttnViewpoint(string $id): View
    {
        $viewpoint = TtnViewpoints::find($id)['data'];
        $records = FindMoreLikeThis::find(Str::slug($viewpoint[0]['title']), 'ttnViewpoints');
        return view('exhibitions.ttn-viewpoint', compact('viewpoint', 'records'));
    }

    /**
     * @return View
     */
    public function peripleo(): View
    {
        return view('exhibitions.peripleo');
    }
}
