<?php

namespace App\Models;

use App\DirectUs;

class PodcastSeries extends Model
{
    protected static string $table = 'podcast_series';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => '*',
                'sort' => '-id'
            )
        );
        return $api->getData();
    }

    /**
     * @param string $slug Slug
     * @return array
     */
    public static function getSeriesID(string $slug): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }
}
