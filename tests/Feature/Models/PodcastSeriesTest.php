<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class PodcastSeriesTest extends TestCase
{
    public function test_list_returns_array()
    {
        $result = \App\Models\PodcastSeries::list();
        $this->assertIsArray($result);
    }

    public function test_get_series_id_returns_array()
    {
        $result = \App\Models\PodcastSeries::getSeriesID("silent-partners-artist-and-mannequin-from-fetish-to-function");
        $this->assertIsArray($result);
    }
}
