<?php

namespace App\Models;

use App\DirectUs;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class ExhibitionsItem extends Model implements Feedable
{
    public mixed $summary;
    public mixed $authorName;
    public mixed $body;
    public mixed $id;
    public mixed $title;
    public mixed $link;
    public mixed $updated_at;

    /**
     * @return Collection
     */
    public static function getFeedItems(): Collection
    {
        return self::feedNews();
    }

    /**
     * @return Collection
     */
    public static function feedNews(): Collection
    {
        $api = new DirectUs(
            'exhibitions',
            array(
                'fields' => 'id,exhibition_title,exhibition_narrative,meta_description,slug,modified_on',
                'sort' => '-id',
                'limit' => 20,
            )
        );
        $news = $api->getData()['data'];
        $news = collect($news)->map(function ($item) {
            return (object)$item;
        });
        $items = collect(); // create new collection

        foreach ($news as $key => $value) {
            $mod = Carbon::parse($value->modified_on);
            $instance = new static; // create new NewsItem model class
            $instance->id = $value->id;
            $instance->title = $value->exhibition_title;
            $instance->summary = $value->meta_description;
            $instance->link = route('exhibition', $value->slug);
            $instance->updated_at = $mod;
            $instance->body = $value->exhibition_narrative;
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
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->summary,
            'updated' => $this->updated_at,
            'content' => $this->body,
            'link' => $this->link,
            'authorName' => $this->authorName,
        ]);
    }
}
