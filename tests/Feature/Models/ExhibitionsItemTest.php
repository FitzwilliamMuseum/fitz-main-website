<?php

namespace Tests\Feature\Models;

use Tests\TestCase;

class ExhibitionsItemTest extends TestCase
{
    public function test_to_feed_item_returns_feed_item_instance()
    {
        $item = new \App\Models\ExhibitionsItem();
        $item->id = 1;
        $item->title = 'Test Exhibition';
        $item->summary = 'Test summary';
        $item->updated_at = now();
        $item->body = 'Test body';
        $item->link = 'https://example.com/exhibition/test';
        $item->authorName = 'The Fitzwilliam Museum';

        $feedItem = $item->toFeedItem();

        $this->assertInstanceOf(\Spatie\Feed\FeedItem::class, $feedItem);
    }

    public function test_to_feed_item_sets_id()
    {
        $item = new \App\Models\ExhibitionsItem();
        $item->id = 1;
        $item->title = 'Test Exhibition';
        $item->summary = 'Test summary';
        $item->updated_at = now();
        $item->body = 'Test body';
        $item->link = 'https://example.com/exhibition/test';
        $item->authorName = 'The Fitzwilliam Museum';

        $feedItem = $item->toFeedItem();

        $this->assertEquals($item->id, $feedItem->id);
    }

    public function test_to_feed_item_sets_title()
    {
        $item = new \App\Models\ExhibitionsItem();
        $item->id = 1;
        $item->title = 'Test Exhibition';
        $item->summary = 'Test summary';
        $item->updated_at = now();
        $item->body = 'Test body';
        $item->link = 'https://example.com/exhibition/test';
        $item->authorName = 'The Fitzwilliam Museum';

        $feedItem = $item->toFeedItem();

        $this->assertEquals($item->title, $feedItem->title);
    }

    public function test_to_feed_item_sets_summary()
    {
        $item = new \App\Models\ExhibitionsItem();
        $item->id = 1;
        $item->title = 'Test Exhibition';
        $item->summary = 'Test summary';
        $item->updated_at = now();
        $item->body = 'Test body';
        $item->link = 'https://example.com/exhibition/test';
        $item->authorName = 'The Fitzwilliam Museum';

        $feedItem = $item->toFeedItem();

        $this->assertEquals($item->summary, $feedItem->summary);
    }

    public function test_to_feed_item_sets_updated()
    {
        $item = new \App\Models\ExhibitionsItem();
        $item->id = 1;
        $item->title = 'Test Exhibition';
        $item->summary = 'Test summary';
        $item->updated_at = now();
        $item->body = 'Test body';
        $item->link = 'https://example.com/exhibition/test';
        $item->authorName = 'The Fitzwilliam Museum';

        $feedItem = $item->toFeedItem();

        $this->assertEquals($item->updated_at, $feedItem->updated);
    }

    public function test_to_feed_item_sets_content()
    {
        $item = new \App\Models\ExhibitionsItem();
        $item->id = 1;
        $item->title = 'Test Exhibition';
        $item->summary = 'Test summary';
        $item->updated_at = now();
        $item->body = 'Test body';
        $item->link = 'https://example.com/exhibition/test';
        $item->authorName = 'The Fitzwilliam Museum';

        $feedItem = $item->toFeedItem();

        $this->assertEquals($item->body, $feedItem->content);
    }

    public function test_to_feed_item_sets_link()
    {
        $item = new \App\Models\ExhibitionsItem();
        $item->id = 1;
        $item->title = 'Test Exhibition';
        $item->summary = 'Test summary';
        $item->updated_at = now();
        $item->body = 'Test body';
        $item->link = 'https://example.com/exhibition/test';
        $item->authorName = 'The Fitzwilliam Museum';

        $feedItem = $item->toFeedItem();

        $this->assertEquals($item->link, $feedItem->link);
    }

    public function test_to_feed_item_sets_author_name()
    {
        $item = new \App\Models\ExhibitionsItem();
        $item->id = 1;
        $item->title = 'Test Exhibition';
        $item->summary = 'Test summary';
        $item->updated_at = now();
        $item->body = 'Test body';
        $item->link = 'https://example.com/exhibition/test';
        $item->authorName = 'The Fitzwilliam Museum';

        $feedItem = $item->toFeedItem();

        $this->assertEquals($item->authorName, $feedItem->authorName);
    }
}
