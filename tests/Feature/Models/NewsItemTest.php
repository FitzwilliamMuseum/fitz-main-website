<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class NewsItemTest extends TestCase
{
    public function test_get_feed_items_returns_collection()
    {
        $result = \App\Models\NewsItem::getFeedItems();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $result);
    }

    public function test_feed_items_returns_collection()
    {
        $result = \App\Models\NewsItem::feedItems();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $result);
    }

    public function test_to_feed_item_returns_feed_item_instance()
    {
        $item = new \App\Models\NewsItem();
        $item->id = 1;
        $item->title = 'Test Title';
        $item->summary = 'Test Summary';
        $item->updated_at = now();
        $item->body = 'Test Body';
        $item->link = 'https://example.com/news/test';
        $item->authorName = 'The Fitzwilliam Museum';
        $feedItem = $item->toFeedItem();
        $this->assertInstanceOf(\Spatie\Feed\FeedItem::class, $feedItem);
    }
}
