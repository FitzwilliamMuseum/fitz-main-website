<?php

namespace App\Models;

use App\DirectUs;

class StoryTelling extends Model
{
    /**
     * @return array
     */
    public static function list(): array
    {
        $api = new DirectUs;
        $api->setEndpoint('story_telling');
        $api->setArguments(
            array(
                'fields' => '*.*.*.*',
                'meta' => 'result_count,total_count,type'
            )
        );
        return $api->getData();
    }
}
