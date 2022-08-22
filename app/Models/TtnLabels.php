<?php

namespace App\Models;

use App\DirectUs;

class TtnLabels extends Model
{
    /**
     * @var string $table The table associated with the model.
     */
    protected static string $table = 'ttn_labels';

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
                'sort' => 'display_id_number',
                'limit' => 150
            )
        );
        return $api->getData();
    }

    public static function listFiltered(string $field): array
    {
        $filter = 'filter[' . $field . '][nnull]';
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => '*',
                $filter => '',
            )
        );
        return $api->getData();
    }

    /**
     * @param int $theme
     * @return array
     */
    public static function listByTheme(int $theme): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => '*',
                'sort' => 'display_id_number',
                'filter[theme][eq]' => $theme
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
                'fields' => '*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug
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
