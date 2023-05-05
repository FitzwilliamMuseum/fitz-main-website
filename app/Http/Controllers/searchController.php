<?php

namespace App\Http\Controllers;

use App\Models\SolrSearch;
use Illuminate\Support\Facades\Config;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Psr\SimpleCache\InvalidArgumentException;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Mews\Purifier\Facades\Purifier;

class searchController extends Controller
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * @param string $path
     * @return array
     * @throws InvalidArgumentException
     */
    public static function injectResults(string $path): array
    {
        $path = Purifier::clean($path, array('HTML.Allowed' => ''));
        $key = md5($path . '404');
        $path = str_replace(array('/', '-'), array(' ', ' '), $path);

        $expiresAt = now()->addMinutes(3600);
        if (Cache::has($key)) {
            $data = Cache::store('file')->get($key);
        } else {
            $configSolr = Config::get('solarium');
            $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
            $query = $client->createSelect();
            $query->setQuery($path);
            $query->setRows(3);
            $data = $client->select($query);
            Cache::store('file')->put($key, $data, $expiresAt);
        }
        return $data->getDocuments();
    }

    /**
     * The index page of the search system
     * @return View
     */
    public function index(): View
    {
        return view('search.index', [
            'enabled' => SolrSearch::isSolrEnabled()
        ]);
    }

    /** Get results for search
     *
     * @param Request $request
     * @return View
     * @throws InvalidArgumentException
     * @throws ValidationException
     */
    public function results(Request $request): View
    {
        $enabled = SolrSearch::isSolrEnabled();

        if (!$enabled) {
            return view('search.results', [
                'enabled' => false
            ]);
        }

        $this->validate($request, [
            'query' => 'required|max:200|min:3',
        ]);
        $queryString = Purifier::clean($request->get('query'), array('HTML.Allowed' => ''));
        $key = md5($queryString . $request->get('page'));
        $perPage = 12;
        $expiresAt = now()->addMinutes(3600);
        $from = ($request->get('page', 1) - 1) * $perPage;
        if (Cache::has($key)) {
            $data = Cache::store('file')->get($key);
        } else {
            $configSolr = Config::get('solarium');
            $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
            $query = $this->client->createSelect();
            $query->setQuery($queryString);
            $query->setQueryDefaultOperator('AND');
            $query->setStart($from);
            $query->setRows($perPage);
            // get the facet-set component
            $facetSet = $query->getFacetSet();
            // create a facet field instance and set options
            $facetSet->createFacetField('type')->setField('contentType');
            $data = $this->client->select($query);
            Cache::store('file')->put($key, $data, $expiresAt);
        }
        $number = $data->getNumFound();
        $records = $data->getDocuments();
        $paginate = new LengthAwarePaginator($records, $number, $perPage);
        $paginate->setPath($request->getBaseUrl() . '?query=' . $queryString);

        return view('search.results', compact('enabled', 'records', 'number', 'paginate', 'queryString'));
    }

    /** Ping function for search
     * @return JsonResponse
     */
    public function ping(): JsonResponse
    {
        $configSolr = Config::get('solarium');
        $this->client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $ping = $this->client->createPing();
        try {
            $this->client->ping($ping);
            return response()->json('OK');
        } catch (Exception $e) {
            return response()->json('ERROR', 500);
        }
    }
}
