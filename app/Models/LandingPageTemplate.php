<?php

namespace App\Models;

use App\DirectUs;


class LandingPageTemplate extends Model
{
    /**
     * @var string
     */
    protected static string $table = 'landing_page_template';

    /**
     * @return array
     */
    public static function getLanding(string $slug = ''): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug,
                'filter[page_template][eq]' => 'landing',
            )
        );
        return $api->getData();
    }
}
