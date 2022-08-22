<?php

namespace App\Models;

use App\DirectUs;

class JekyllSites extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'jekyll_sites';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => 'subdomain',
            )
        );
        $domains = $api->getData()['data'];
        $list = [];
        foreach ($domains as $domain) {
            $list[] = $domain['subdomain'];
        }
        return $list;
    }

}
