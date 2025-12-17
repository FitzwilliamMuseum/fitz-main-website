<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class ResearchProjectsItemTest extends TestCase
{
    public function test_get_feed_items_returns_collection()
    {
        $result = \App\Models\ResearchProjectsItem::getFeedItems();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $result);
    }

    public function test_feed_items_returns_collection()
    {
        $result = \App\Models\ResearchProjectsItem::feedItems();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $result);
    }
}
