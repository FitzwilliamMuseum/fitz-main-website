<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class ResearchOpportunitiesItemTest extends TestCase
{
    public function test_get_feed_items_returns_collection()
    {
        $result = \App\Models\ResearchOpportunitiesItem::getFeedItems();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $result);
    }

    public function test_feed_items_returns_collection()
    {
        $result = \App\Models\ResearchOpportunitiesItem::feedItems();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $result);
    }

    public function test_to_feed_item_returns_feed_item()
    {
        $model = new \App\Models\ResearchOpportunitiesItem();
        // Set required properties for FeedItem creation
        $reflection = new \ReflectionClass($model);
        foreach ([
            'link' => 'http://example.com',
            'title' => 'Test Title',
            'summary' => 'Test Summary',
            'updated_at' => now(),
            'body' => 'Test Body',
            'authorName' => 'Test Author',
        ] as $property => $value) {
            $prop = $reflection->getProperty($property);
            $prop->setAccessible(true);
            $prop->setValue($model, $value);
        }
        $result = $model->toFeedItem();
        $this->assertInstanceOf(\Spatie\Feed\FeedItem::class, $result);
    }
}
