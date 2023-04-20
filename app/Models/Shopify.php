<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;
use PHPShopify\Exception\ApiException;
use PHPShopify\Exception\CurlException;
use PHPShopify\ShopifySDK;
use Psr\SimpleCache\InvalidArgumentException;
use Solarium\Core\Client\Adapter\Curl;
use Solarium\Core\Client\Client;
use Solarium\Core\Query\DocumentInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class Shopify extends Model
{
    /**
     * @return mixed|DocumentInterface[]
     * @throws InvalidArgumentException
     */
    public static function list(): mixed
    {
        if (!SolrSearch::isSolrEnabled()) {
            return [];
        }

        $expiresAt = Carbon::now()->addMinutes(3600);
        $key = md5('shopify-api-front');
        if (Cache::has($key)) {
            $shopify = Cache::store('file')->get($key);
        } else {
            $configSolr = Config::get('solarium');
            $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
            $query = $client->createSelect();
            $query->setQuery('contentType:shopify AND price:[1 TO *]');
            $query->setRows(3);
            $randString = mt_rand();

            $query->addSort('random_' . $randString, $query::SORT_DESC);
            $call = $client->select($query);
            $shopify = $call->getDocuments();
            Cache::store('file')->put($key, $shopify, $expiresAt);
        }
        return $shopify;
    }

    /**
     * @param string $ids
     * @return array
     * @throws ApiException
     * @throws CurlException
     */
    public static function getShopifyCollection(string $ids): array
    {
        $config = array(
            'ShopUrl' => env('SHOPIFY_FME_URL'),
            'ApiKey' => env('SHOPIFY_FME_API_KEY'),
            'Password' => env('SHOPIFY_FME_API_PASSWORD'),
        );
        $shop = new ShopifySDK;
        $shop->config($config);
        return $shop->Product->get(['limit' => 3, 'status' => 'active', 'ids' => $ids]);
    }
}
