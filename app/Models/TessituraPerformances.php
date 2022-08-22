<?php

namespace App\Models;

use App\TessituraApi;
use GuzzleHttp\Exception\GuzzleException;

class TessituraPerformances extends Model
{
    /**
     * @param string $id
     * @return mixed
     * @throws GuzzleException
     */
    public static function getExhibitionPerformances(string $id): mixed
    {
        $api = new TessituraApi();
        return $api->getPerformances($id);
    }

}
