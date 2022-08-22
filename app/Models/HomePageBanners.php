<?php

namespace App\Models;

use App\DirectUs;

class HomePageBanners
{
    /**
     * @return array
     */
    public static function getBanner(): array
    {
        $args = [
            'filter[expire][gte]' => 'now',
            'limit' => 1,
            'fields' => '*.*.*.*',
        ];
        $api = new DirectUs(
            'banner_images',
            $args
        );
        $banner = $api->getData();
        if(!empty($banner['data'])) {
            return Collect($banner['data'])->first();
        } else {
            return [];
        }
    }
}
