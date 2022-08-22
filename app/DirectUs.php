<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use JetBrains\PhpStorm\Pure;

class DirectUs
{

    /**
     * @param string $_endpoint
     * @param array $_args
     * @param string|null $_fields
     */
    public function __construct(public string $_endpoint, public array $_args, public ?string $_fields = null)
    {
    }

    /**
     * @return string
     */
    #[Pure] public function buildQuery(): string
    {
        return '?' . http_build_query($this->_args);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $url = env('DIRECTUS_URL') . $this->_endpoint . $this->buildQuery();
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
