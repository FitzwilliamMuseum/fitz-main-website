<?php

namespace App\Models;

use App\DirectUs;
use Carbon\Carbon;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class ResearchOpportunitiesItem extends Model implements Feedable
{
    public string $link;
    public string $title;
    public Carbon $updated_at;
    public string $authorName;
    public string $body;
    public string $summary;
    public string $id;
    public bool $exists;

    public static function getFeedItems(): Collection
    {
        return self::feedItems();
    }

    public static function feedItems(): Collection
    {
        $api = new DirectUs(
            'research_opportunities',
            array(
                'fields' => 'id,title,meta_description,description,slug,created_on',
                'sort' => '-created_on',
                'limit' => 20,
            )
        );
        $news = $api->getData();
        $news = collect($news['data'])->map(function ($item) {
            return (object)$item;
        });
        $items = collect(); // create new collection
        foreach ($news as $key => $value) {
            $instance = new static; // create new NewsItem model class
            $instance->id = route('opportunity', $value->slug);
            $instance->title = $value->title;
            $instance->summary = $value->meta_description;
            $instance->link = route('opportunity', $value->slug);
            $instance->updated_at = Carbon::parse($value->created_on);
            $instance->body = $value->description;
            $instance->authorName = 'The Fitzwilliam Museum';
            $instance->exists = true;
            $items[$key] = $instance;
        }
        return $items;
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create([
            'id' => $this->link,
            'title' => $this->title,
            'summary' => $this->summary,
            'updated' => $this->updated_at,
            'content' => $this->body,
            'link' => $this->link,
            'authorName' => $this->authorName,
        ]);
    }
}
