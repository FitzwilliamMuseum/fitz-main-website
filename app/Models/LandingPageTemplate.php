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
            'landing_page_template',
            array(
                'fields' => '*.*.*.*',
                'meta' => '*',
                'filter[slug][eq]' => $slug,
                'filter[page_template][eq]' => 'landing',
            )
        );
        return $api->getData();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function getSubpage(string $slug): array
    {
        $api = new DirectUs(
            'subpages',
            array(
                'fields' => '*.*.*.*',
                'filter[slug][eq]' => $slug,
                'meta' => '*',
            )
        );
        return $api->getData();
    }
}
