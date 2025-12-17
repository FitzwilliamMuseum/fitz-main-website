<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class PodcastArchiveTest extends TestCase
{
    public function test_find_returns_array()
    {
        $result = \App\Models\PodcastArchive::find(2);
        $this->assertIsArray($result);
    }

    public function test_find_by_episode_returns_array()
    {
        $result = \App\Models\PodcastArchive::findByEpisode('recreating-poussins-great-machine');
        $this->assertIsArray($result);
    }

        public function test_find_returns_array_with_data_key()
        {
            $result = \App\Models\PodcastArchive::find(2);
            $this->assertIsArray($result);
            $this->assertArrayHasKey('data', $result);
        }

        public function test_find_by_episode_returns_array_with_data_key()
        {
            $result = \App\Models\PodcastArchive::findByEpisode('recreating-poussins-great-machine');
            $this->assertIsArray($result);
            $this->assertArrayHasKey('data', $result);
        }

}
