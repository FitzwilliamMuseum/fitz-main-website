<?php

namespace App\Models;

use App\TessituraApi;
use Cache;
use Carbon\Carbon;

class EventsTessitura extends Model
{
    public static function list()
    {
      $expiresAt = now()->addMinutes(3600);
      $keyTess = md5('tessitura-home');
      if (Cache::has($keyTess)) {
        $productions = Cache::store('file')->get($keyTess);
      } else {
        $productions = (new self)->getTessituraApi();
        $productions->setPerformanceStartDate(Carbon::now());
        $productions->setPerformanceEndDate(Carbon::now()->addDays(30));
        $productions->setFacilities('lectures');
        $productions = $productions->getPerformancesSearch();
        Cache::store('file')->put($keyTess, $productions, $expiresAt);
      }
      return $productions;
    }

    public function getTessituraApi()
    {
      return new TessituraApi;
    }
}
