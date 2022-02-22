<?php

namespace App\Models;

use App\DirectUs;
use Illuminate\Database\Eloquent\Model;

class Themes extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs();
        $api->setEndpoint('themes');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
            )
        );
        return $api->getData();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function details(string $slug): array
    {
        $api = new DirectUs();
        $api->setEndpoint('themes');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }
}
