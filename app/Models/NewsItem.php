<?php

namespace App\Models;

use App\DirectUs;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class NewsItem extends Model implements Feedable
{
    /**
     * @var mixed
     */
    public mixed $body;
    /**
     * @var mixed
     */
    public mixed $link;
    /**
     * @var mixed
     */
    public mixed $updated_at;
    /**
     * @var mixed|string
     */
    public mixed $authorName;
    /**
     * @var mixed|string
     */
    public mixed $id;
    /**
     * @var mixed
     */
    public mixed $title;
    /**
     * @var mixed
     */
    public mixed $summary;

    /**
     * @return Collection
     */
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
            'news_articles',
            array(
                'fields' => 'id,article_title,article_excerpt,article_body,slug,modified_on',
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
            $instance->id = route('article', $value->slug);
            $instance->title = $value->article_title;
            $instance->summary = $value->article_excerpt;
            $instance->link = route('article', $value->slug);
            $instance->updated_at = $mod;
            $instance->body = $value->article_body;
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
