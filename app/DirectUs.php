<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use JetBrains\PhpStorm\Pure;

class DirectUs
{

    /**
     * @var string
     */
    public string $_directUsUrl = 'https://content.fitz.ms/fitz-website/items/';

    /**
     * @var string
     */
    public string $_endpoint = '';
    /**
     * @var array
     */
    public array $_args = array();

    /**
     * @var string
     */
    protected string $_meta = 'meta=total_count,result_count';
    /**
     * @var string
     */
    protected string $_fields = '*.*.*';

    /**
     * @return string
     */
    public function getFields(): string
    {
        return $this->_fields;
    }

    /**
     * @param string $fields
     * @return string
     */
    public function setFields(string $fields): string
    {
        $this->_fields = $fields;
        return $this->_fields;
    }

    /**
     * @return string
     */
    public function getMeta(): string
    {
        return $this->_meta;
    }

    /**
     * @param array $args
     * @return $this
     */
    public function setArguments(array $args): static
    {
        $this->_args = $args;
        return $this;
    }

    /**
     * @return string
     */
    #[Pure] public function getCallUrl(): string
    {
        return $this->getDirectUsUrl() . $this->getEndPoint() . $this->buildQuery();
    }

    /**
     * @return string
     */
    public function getDirectUsUrl(): string
    {
        return $this->_directUsUrl;
    }

    /**
     * @return string
     */
    public function getEndPoint(): string
    {
        return $this->_endpoint;
    }

    /**
     * @param $endpoint
     * @return string
     */
    public function setEndpoint($endpoint): string
    {
        $this->_endpoint = $endpoint . '?';
        return $this->_endpoint;
    }

    /**
     * @return string
     */
    #[Pure] public function buildQuery(): string
    {
        return http_build_query($this->getArgs());
    }

    /**
     * @return array
     */
    public function getArgs(): array
    {
        return $this->_args;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $url = $this->getDirectUsUrl() . $this->getEndPoint() . $this->buildQuery();
        $key = md5($url);
        $expiresAt = now()->addMinutes(20);
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $response = Http::get($url);
            $data = $response->json();
            Cache::put($key, $data, $expiresAt);
        }
        return $data;
    }
}
