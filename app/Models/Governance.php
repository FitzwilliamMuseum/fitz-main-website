<?php

namespace App\Models;

use App\DirectUs;

class Governance extends Model
{
    /**
     * @var string $table
     */
    protected static string $table = 'governance_files';

    /**
     * @return array
     */
    public static function getGovernance(): array
    {
        $directus = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*',
                'meta' => '*',
                'sort' => 'title',
                'limit' => 100
            )
        );
        return $directus->getData();
    }

    /**
     * @param string $type
     * @return array
     */
    public static function getGovernanceByType(string $type): array
    {
        $directus = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*',
                'meta' => '*',
                'sort' => '-title',
                'limit' => 30,
                'filter[type]' => $type,
            )
        );
        return $directus->getData();
    }
}
