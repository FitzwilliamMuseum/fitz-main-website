<?php

namespace App;


use Config;
use PHPShopify\Exception\ApiException;
use PHPShopify\Exception\CurlException;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Solarium\Core\Query\Result\ResultInterface;
use Solarium\QueryType\Update\Result;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Illuminate\Support\Arr;
use PHPShopify\ShopifySDK;

class SolrImporter
{
    /**
     * @param array $data
     * @param string $contentType
     * @param string $table
     * @param string $route
     * @param array $params
     * @param array $mapping
     * @return ResultInterface|Result
     */
    public function import(array $data, string $contentType, string $table, string $route, array $params, array $mapping): Result|ResultInterface
    {
        $configSolr = Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $update = $client->createUpdate();
        $documents = array();
        foreach ($data as $record) {
            $parameters = [];
            foreach ($params as $param) {
                $parameters[] = $record[$param];
            }
            $title = Arr::get($record, $mapping['title']);
            $content = strip_tags(Arr::get($record, $mapping['content']));
            if (array_key_exists('image', $mapping)) {
                $image = $mapping['image'];
            } else {
                $image = 'hero_image';
            }
            $doc = $update->createDocument();
            $doc->id = $record['id'] . '-' . $table;
            $doc->title = $title;
            $doc->description = $content;
            $doc->body = $content;
            if (array_key_exists('slug', $record)) {
                $doc->slug = $record['slug'];
            }
            $doc->url = route($route, $parameters);
            $doc->contentType = $contentType;
            if (array_key_exists($image, $record)) {
                if (!empty($record[$image]['data'])) {
                    $doc->thumbnail = $record[$image]['data']['thumbnails'][5]['url'];
                    $doc->image = $record[$image]['data']['full_url'];
                    $doc->smallimage = $record[$image]['data']['thumbnails'][13]['url'];
                    $doc->searchImage = $record[$image]['data']['thumbnails'][13]['url'];
                }
            }
            // Section
            if (Arr::exists($record, 'section')) {
                if (Arr::accessible($record['section'])) {
                    $doc->section = $record['section'];
                }
            }
            // Key stage for learning activities
            if (Arr::exists($record, 'keystages')) {
                if (Arr::accessible($record['keystages'])) {
                    $doc->keystages = implode(',', array_filter($record['keystages']));
                }
            }
            // Single keystage entry
            if (Arr::exists($record, 'key_stage')) {
                    $doc->key_stage = $record['key_stage'];
            }
            // Session type - learning files type
            if (Arr::exists($record, 'type')) {
                $doc->type = $record['type'];
            }
            // Type of activities school sessions -array
            if (Arr::exists($record, 'type_of_activity')) {
                if (Arr::accessible($record['type_of_activity'])) {
                    $doc->type_of_activity = implode(',',array_filter($record['type_of_activity']));
                }
            }
            // Type of activities school sessions - array
            if (Arr::exists($record, 'session_type')) {
                if (Arr::accessible($record['session_type'])) {
                    $doc->session_types = implode(',',array_filter($record['session_type']));
                }
            }
            // School sessions curriculum link - array of values
            if (Arr::exists($record, 'curriculum_link')) {
                if (Arr::accessible($record['curriculum_link'])) {
                    $doc->curriculum_link = implode(',',array_filter($record['curriculum_link']));
                }
            }
            // School sessions theme - array of values
            if (Arr::exists($record, 'theme')) {
                if (Arr::accessible($record['theme'])) {
                    $doc->themes = implode(',',array_filter($record['theme']));
                }
            }
            // Learning files curriculum area - string
            if (Arr::exists($record, 'curriculum_area')) {
                $doc->curriculum_area = $record['curriculum_area'];
            }

            // Attached files - array
            if (Arr::exists($mapping, 'file')) {
                $doc->url = $record[$mapping['file']]['data']['url'];
                $doc->mimetype = $record[$mapping['file']]['type'];
                $doc->filesize = $record[$mapping['file']]['filesize'];
            }
            $documents[] = $doc;
        }
        $update->addDocuments($documents);
        $update->addCommit();
        return $client->update($update);
    }

    /**
     * @return ResultInterface|Result
     * @throws ApiException
     * @throws CurlException
     */
    public function shopify(): Result|ResultInterface
    {
        $shopify = $this->getShopifyObjects();
        $url = env('SHOPIFY_FME_URL');
        $shop = env('SHOPIFY_FME_LIVE_URL');
        $protocol = env('SHOPIFY_FME_PROTOCOL');
        $catalogue = env('SHOPIFY_FME_CATALOGUE');
        $configSolr = Config::get('solarium');
        $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
        $update = $client->createUpdate();
        $documents = array();
        foreach ($shopify as $product) {
            $doc = $update->createDocument();
            $doc->id = $product['id'];
            $doc->title = $product['title'];
            $description = $product['body_html'];
            $doc->description = strip_tags($description);
            $doc->body = strip_tags($description);
            $doc->url = $protocol . $shop . $catalogue . $product['handle'];
            $doc->slug = $product['handle'];
            $doc->vendor = $product['vendor'];
            if (array_key_exists('image', $product)) {
                $doc->thumbnail = $product['image']['src'];
                $doc->image = $product['image']['src'];
                $doc->searchImage = $product['image']['src'];
            }
            $doc->price = $product['variants'][0]['price'];
            $doc->contentType = 'shopify';
            $documents[] = $doc;
        }
        $update->addDocuments($documents);
        $update->addCommit();
        return $client->update($update);
    }

    /**
     * @return array
     * @throws ApiException
     * @throws CurlException
     */
    public function getShopifyObjects(): array
    {
        $config = array(
            'ShopUrl' => env('SHOPIFY_FME_URL'),
            'ApiKey' => env('SHOPIFY_FME_API_KEY'),
            'Password' => env('SHOPIFY_FME_API_PASSWORD'),
        );
        $shop = new ShopifySDK;
        $shop->config($config);
        $lastId = 1;
        return $shop->Product->get(['limit' => 250, 'since_id' => $lastId, 'status' => 'active']);
    }

}
