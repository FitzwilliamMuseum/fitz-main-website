<?php

namespace App\Models;

use App\DirectUs;
use Carbon\Carbon;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class ResearchProjectsItem extends Model implements Feedable
{
    private Carbon $updated_at;
    private string $body;
    private string $summary;
    private string $link;
    private string $id;
    private string $authorName;
    private string $title;
    private bool $exists;

    public static function getFeedItems(): Collection
    {
        return self::feedItems();
    }

    /**
     * @return Collection
     */
    public static function feedItems(): Collection
    {
        $api = new DirectUs(
            'research_projects',
            array(
                'fields' => 'id,title,summary,project_overview,slug,created_on',
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
            $instance->id = route('article', $value->slug);
            $instance->title = $value->title;
            $instance->summary = $value->summary;
            $instance->link = route('research-project', $value->slug);
            $instance->updated_at = Carbon::parse($value->created_on);
            $instance->body = $value->project_overview;
            $instance->authorName = 'The Fitzwilliam Museum';
            $instance->exists = true;
            $items[$key] = $instance;
        }
        return $items;
    }

    /**
     * @return FeedItem
     */
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
