<?php

namespace App\Models;

use App\DirectUs;

class JekyllSites extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('jekyll_sites');
        $api->setArguments(
            array(
                'fields' => 'subdomain',
            )
        );
        $domains = $api->getData()['data'];
        $list = [];
        foreach($domains as $domain){
            $list[] = $domain['subdomain'];
        }
        return $list;
    }

}
