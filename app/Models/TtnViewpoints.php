<?php

namespace App\Models;

use App\DirectUs;

class TtnViewpoints extends Model
{
    /**
     * @var string $table The table associated with the model.
     */
    protected static string $table = 'ttn_viewpoints';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'sort' => 'id'
            )
        );
        return $api->getData();
    }


    /**
     * @param string $id
     * @return array
     */
    public static function find(string $id): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*',
                'meta' => '*',
                'filter[id][eq]' => $id
            )
        );
        return $api->getData();
    }

    /**
     * @param int $id
     * @return array
     */
    public static function byArtist(int $id): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => '*',
                'filter[artist][eq]' => $id
            )
        );
        return $api->getData();
    }
}
