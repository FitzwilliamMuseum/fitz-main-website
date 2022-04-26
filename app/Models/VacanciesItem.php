<?php

namespace App\Models;

use App\DirectUs;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class VacanciesItem extends Model implements Feedable
{
    private string $link;
    private string $title;
    private string $id;
    private string $body;
    private string $authorName;
    private string $summary;
    private Carbon $updated_at;

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
        $api = new DirectUs;
        $api->setEndpoint('vacancies');
        $api->setArguments(
            array(
                'fields' => 'id,job_title,job_description,meta_description,slug,modified_on',
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
            $instance->title = $value->job_title;
            $instance->summary = $value->meta_description;
            $instance->link = route('vacancy', $value->slug);
            $instance->updated_at = $mod;
            $instance->body = $value->job_description;
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
