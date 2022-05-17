<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Psr\SimpleCache\InvalidArgumentException;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Config;

class SolrSearch extends Model
{
    /**
     * @param string $query
     * @param string $type
     * @return array
     * @throws InvalidArgumentException
     */
    public static function injectResults(string $query, string $type): array
    {
        $search = Purifier::clean($query, array('HTML.Allowed' => ''));
        $key = md5($search . '404');

        $expiresAt = now()->addMinutes(3600);
        if (Cache::has($key)) {
            $data = Cache::store('file')->get($key);
        } else {
        $configSolr = Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $query = $client->createSelect();
        $helper = $query->getHelper();
        $query->setQuery($helper->escapePhrase($search));
        $query->setRows(3);
        $query->createFilterQuery('type')->setQuery('contentType:' . $type);
        $data = $client->select($query);
            Cache::store('file')->put($key, $data, $expiresAt);
        }
        return $data->getDocuments();
    }
}
