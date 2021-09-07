<?php

namespace App\Models;
use App\DirectUs;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class ExhibitionsItem extends Model implements Feedable
{
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

  public static function feedNews()
  {
    $api = new DirectUs;
    $api->setEndpoint('exhibitions');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'fields' => 'id,exhibition_title,exhibition_narrative,meta_description,slug,modified_on',
          'sort' => '-id',
          'limit' => 20,
      )
    );
    $news = $api->getData()['data'];
    $news = collect($news)->map(function ($item) {
      return (object) $item;
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
        $instance->exists = true; // tell this model is already exists, forcely
        $items[$key] = $instance; // assign this model to the collection
    }
    return $items;
  }

  public static function getFeedItems()
  {
    return self::feedNews();
  }
}
