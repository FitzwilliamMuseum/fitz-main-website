<?php

namespace App\Models;

use App\DirectUs;

class HomePageHero
{
    /**
     * @return array
     */
    public static function getHeroData(): array
    {
        $args = [
            'limit' => 1,
            'fields' => '*.*.*.*',
        ];
        $api = new DirectUs(
            'home_page_config', //home_page_config collection
            $args
        );
        $heroData = $api->getData();
        if(!empty($heroData['data'])) {
            return Collect($heroData['data'])->first();
        } else {
            return [];
        }
    }
}
