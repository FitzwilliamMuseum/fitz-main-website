<?php

namespace App\Models;

use App\DirectUs;

class HighlightPages extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'pharos_pages';

    /**
     * @param string $slug
     * @param string $section
     * @return array
     */
    public static function list(string $slug, string $section): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][eq]' => $slug,
                'filter[section][eq]' => $section
            )
        );
        return $api->getData();
    }


    /**
     * @return array
     */
    public static function getContexts(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => 'section,hero_image_alt_text,hero_image.*',
                'meta' => 'result_count,total_count,type'
            )
        );
        return $api->getData();
    }

    /**
     * @return array
     */
    public static function getByContext(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => 'section,hero_image.*',
                'meta' => 'result_count,total_count,type'
            )
        );
        return $api->getData();
    }

    /**
     * @param string $section
     * @return array
     */
    public static function getBySection(string $section): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[section][eq]' => $section
            )
        );
        return $api->getData();
    }

}
