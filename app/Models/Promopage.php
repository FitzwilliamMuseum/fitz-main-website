<?php

namespace App\Models;

use App\DirectUs;


class Promopage extends Model
{
    /**
     * @var string
     */
    protected static string $table = 'promo_pages';

    /**
     * @param string $slug
     * @return array
     */
    public static function getSubpage(string $slug): array
    {
        $api = new DirectUs(
            'promo_pages',
            array(
                'fields' => '*.*.*.*',
                'filter[slug][eq]' => $slug,
                'meta' => '*',
            )
        );
        return $api->getData();
    }
}
