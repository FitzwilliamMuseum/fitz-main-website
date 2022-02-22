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
    private string $link;
    private string $title;
    private Carbon $updated_at;
    private string $authorName;
    private string $body;
    private string  $summary;
    private string $id;
    private bool $exists;

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

  public static function feedItems(): Collection
  {
    $api = new DirectUs;
    $api->setEndpoint('research_opportunities');
    $api->setArguments(
        array(
            'fields' => 'id,title,meta_description,description,slug,created_on',
            'sort' => '-created_on',
            'limit' => 20,
        )
    );
    $news = $api->getData();
    $news = collect($news['data'])->map(function ($item) {
      return (object) $item;
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

  public static function getFeedItems(): Collection
  {
    return self::feedItems();
  }
}
