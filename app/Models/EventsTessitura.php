<?php

namespace App\Models;

use App\TessituraApi;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use JetBrains\PhpStorm\Pure;
use Psr\SimpleCache\InvalidArgumentException;

class EventsTessitura extends Model
{
    /**
     * @return array
     * @throws GuzzleException|InvalidArgumentException
     */
    public static function list(): array
    {
        $expiresAt = now()->addMinutes(1440);
        $keyTess = md5('tessitura-home');
        if (Cache::has($keyTess)) {
            $productions = Cache::store('file')->get($keyTess);
        } else {
            $productions = (new self)->getTessituraApi();
            $productions->setPerformanceStartDate(Carbon::now());
            $productions->setPerformanceEndDate(Carbon::now()->addDays(120));
            $productions->setFacilities('lectures');
            $productions = $productions->getPerformancesSearch();
            Cache::store('file')->put($keyTess, $productions, $expiresAt);
        }
        return $productions;
    }

    /**
     * @return TessituraApi
     */
    #[Pure] public function getTessituraApi(): TessituraApi
    {
        return new TessituraApi;
    }
}
