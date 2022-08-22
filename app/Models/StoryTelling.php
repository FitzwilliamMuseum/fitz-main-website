<?php

namespace App\Models;

use App\DirectUs;

class StoryTelling extends Model
{
    /**
     * @var string
     */
    protected static string $table = 'story_telling';

    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs(
            self::$table,
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type'
            )
        );
        return $api->getData();
    }
}
