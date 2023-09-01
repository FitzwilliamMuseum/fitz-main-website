<?php

namespace App\Models;

use App\DirectUs;


class Stubs extends Model
{
    /**
     * @var string
     */
    protected static string $table = 'stubs_and_pages';

    /**
     * @param string $section
     * @param string $slug
     * @return array
     */
    public static function getPage(string $section, string $slug): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug,
                'filter[section][eq]' => $section,
            )
        );
        return $api->getData();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function findBySlug(string $slug): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[slug][eq]' => $slug
            )
        );
        return $api->getData();
    }

    /**
     * @param string $subsection
     * @return array
     */
    public static function findBySubSection(string $subsection): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[subsection][eq]' => $subsection
            )
        );
        return $api->getData();
    }

    /**
     * @param string $section
     * @return array
     */
    public static function getLanding(string $section): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[landing_page][eq]' => '1',
                'filter[section][eq]' => $section,
            )
        );
        return $api->getData();
    }

    /**
     * @param string $section
     * @param string $slug
     * @return array
     */
    public static function getLandingBySlug(string $section, string $slug): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'filter[section]=' => $section,
                'filter[slug]=' => $slug,
                'filter[landing_page]' => '1',
                'fields' => '*.*.*'
            )
        );
        return $api->getData();
    }

    /**
     * @param string $section
     * @return array
     */
    public static function getAssociated(string $section): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[landing_page][null]' => '',
                'filter[section][eq]' => $section,
                'filter[associate_with_landing_page][eq]' => '1',
                'sort' => 'custom_order'
            )
        );

        return $api->getData();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public static function getHighlightPage(int $id): mixed
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[id][eq]' => $id
            )
        );
        return $api->getData()['data'][0];
    }

    /**
     * @return array
     */
    public static function visitUsAssociated():array
    {
        $api = new DirectUs(
            'stubs_and_pages',
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[section][eq]' => 'visit-us',
                'filter[landing_page][null]' => '',
                'filter[associate_with_landing_page][eq]' => '1'
            )
        );
        return $api->getData();
    }

    public static function visitUsLanding(): array
    {
        $api = new DirectUs(
            'stubs_and_pages',
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[section][eq]' => 'visit-us',
                'filter[landing_page][eq]' => '1',
            )
        );
        return $api->getData();
    }

    /**
     * @param string $section
     * @return array
     */
    public static function getLandingBySection(string $section): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type',
                'filter[section][eq]' => $section,
                'filter[landing_page][eq]' => '1',
            )
        );
        return $api->getData();
    }
}
