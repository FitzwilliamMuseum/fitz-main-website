<?php

namespace App\FitzElastic;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\Cache;

class Elastic
{

    /**
     * @var array
     */
    protected array $_params;

    /**
     * @return array
     */
    public function getCount(): array
    {
        return $this->getElasticClient()->count($this->getParams());
    }

    /**
     * @return Client
     */
    public function getElasticClient(): Client
    {
        return ClientBuilder::create()->setHosts($this->getHosts())->build();
    }

    /**
     * @return array[]
     */
    public function getHosts(): array
    {
        return [
            [
                'scheme' => env('ELASTIC_SCHEME'),
                'host' => env('ELASTIC_API'),
                'path' => env('ELASTIC_PATH'),
                'port' => 80
            ]
        ];
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->_params;
    }

    /**
     * @param $params
     * @return $this
     */
    public function setParams($params): Elastic
    {
        $this->_params = $params;
        return $this;
    }

    /**
     * @return array
     */
    public function getSearch(): array
    {
        $key = $this->getKey();
        $expiresAt = now()->addMinutes(60);
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = $this->getElasticClient()->search($this->getParams());
            Cache::put($key, $data, $expiresAt);
        }
        return $data;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return md5(json_encode($this->getParams()));
    }

}
