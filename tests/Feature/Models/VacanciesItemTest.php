<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class VacanciesItemTest extends TestCase
{
    public function test_get_feed_items_returns_collection()
    {
        $result = \App\Models\VacanciesItem::getFeedItems();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $result);
    }

    public function test_feed_news_returns_collection()
    {
        $result = \App\Models\VacanciesItem::feedNews();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $result);
    }

    public function test_to_feed_item_returns_feed_item()
    {
        $model = new \App\Models\VacanciesItem();
        // Set required properties for FeedItem creation
        $reflection = new \ReflectionClass($model);
        foreach ([
            'id' => 'test-id',
            'title' => 'Test Title',
            'summary' => 'Test Summary',
            'updated_at' => now(),
            'body' => 'Test Body',
            'link' => 'http://example.com',
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
