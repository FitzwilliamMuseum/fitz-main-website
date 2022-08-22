<?php

namespace App\Models;

use App\DirectUs;

class AudioGuide extends Model
{
    protected static string $table = 'audio_guides';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'sort' => 'stop_number'
            )
        );
        return $api->getData();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function find(string $slug): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][eq]' => $slug,
            )
        );
        return $api->getData();
    }
}
