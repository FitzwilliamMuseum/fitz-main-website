<?php

namespace App\Models;

use App\DirectUs;

class PodcastArchive extends Model
{
    protected static string $table = 'podcast_archive';

    /**
     * @param string $id
     * @return array
     */
    public static function find(string $id): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'filter[podcast_series.podcast_series_id][in]' => $id,
            )
        );
        return $api->getData();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function findByEpisode(string $slug): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }
}
