<?php

namespace App\Models;

use App\DirectUs;

class Exhibitions extends Model
{
    protected static string $table = 'exhibitions';

    /**
     * @param string $status
     * @param string $sort
     * @param string $type
     * @param int $limit
     * @return array
     */
    public static function list(string $status = 'current', string $sort = '-ticketed', string $type = 'exhibition', int $limit = 100): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'filter[exhibition_status][eq]' => $status,
                'filter[type][eq]' => $type,
                'meta' => '*',
                'sort' => $sort,
                'limit' => $limit
            )
        );
        return $api->getData();
    }

    /**
     * @param string $status
     * @param string $sort
     * @param int $limit
     * @return array
     */
    public static function listFuture(string $status = 'future', string $sort = '-ticketed', int $limit = 100): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'filter[exhibition_status][eq]' => $status,
                'meta' => '*',
                'sort' => $sort,
                'limit' => $limit
            )
        );
        return $api->getData();
    }

    /**
     * @param string $status
     * @param string $sort
     * @param int $limit
     * @return array
     */
    public static function listHome(string $status = 'current', string $sort = '-ticketed', int $limit = 100): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'filter[featured_home][eq]' => 'yes',
                'meta' => 'result_count,total_count,type',
                'sort' => $sort,
                'limit' => $limit
            )
        );
        return $api->getData();
    }

    /**
     * @param string $status
     * @param string $sort
     * @param int $limit
     * @return array
     */
    public static function tileVisit(string $status = 'current', string $sort = '-ticketed', int $limit = 1): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => 'hero_image_alt_text,hero_image.*.*.*.*',
                'filter[featured_home][eq]' => 'yes',
                'meta' => '*',
                'sort' => $sort,
                'limit' => $limit
            )
        );

        $results = Collect($api->getData()['data'])->first();

        /**
         * The Directus query can return `null`, but this causes errors as this 
         * method is set to return an array, and a `null` return value is
         * erroneous 
         */
        if(empty($results)) {
            $results = [];
        }

        return $results;
    }

    /**
     * @param string $status
     * @param int $limit
     * @return array
     */
    public static function tileDisplay(string $status = 'current', int $limit = 1): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => 'hero_image_alt_text,hero_image.*.*.*.*',
                'filter[featured_home][eq]' => 'no',
                'filter[exhibition_status][eq]' => $status,
                'meta' => '*',
                'sort' => '?',
                'limit' => $limit
            )
        );
        return Collect($api->getData()['data'])->first();
    }

    /**
     * @param string $status
     * @param string $sort
     * @param int $limit
     * @return array
     */
    public static function archive(string $status = 'current', string $sort = '-ticketed', int $limit = 100): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'filter[exhibition_status][eq]' => $status,
                'meta' => 'result_count,total_count,type',
                'sort' => $sort,
                'limit' => $limit
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
                'fields' => '*.*.*.*.*.*',
                'filter[slug][eq]' => $slug,
                'meta' => '*'
            )
        );
        return $api->getData();
    }

    /**
     * @return array
     */
    public static function immunity(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'filter[immunity_from_seizure][nnull]' => '',
                'sort' => '-exhibition_end_date'
            )
        );
        return $api->getData();
    }

    /**
     * @return array
     */
    public static function loanImmunity(): array
    {
        $api = new DirectUs(
            'incoming_loans',
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'filter[immunity_from_seizure][nnull]' => '',
                'sort' => '-id'
            )
        );
        return $api->getData();
    }

    /**
     * @param int $curator
     * @return array
     */
    public static function findByExternals(int $curator): array
    {
        $api = new DirectUs(
            'exhibitions_associated_people',
            array(
                'fields' => '*.*.*.*',
                'filter[associated_people_id][in]' => $curator,
            )
        );
        return $api->getData();
    }
}
