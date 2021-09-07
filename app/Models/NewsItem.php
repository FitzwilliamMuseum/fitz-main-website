<?php

namespace App\Models;
use App\DirectUs;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class NewsItem extends Model implements Feedable
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

  public static function feedItems()
  {
    $api = new DirectUs;
    $api->setEndpoint('news_articles');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'fields' => 'id,article_title,article_excerpt,article_body,slug,modified_on',
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
      // dump(Carbon::parse($value->modified_on));
        // $news[$key]->updated_at = Carbon::parse($value->modified_on)->format('dS F Y H:i a');
        // $news[$key]->link = route('article', $value->slug);
        $mod = Carbon::parse($value->modified_on);
        $instance = new static; // create new NewsItem model class
        $instance->id = $value->id;
        $instance->title = $value->article_title;
        $instance->summary = $value->article_excerpt;
        $instance->link = route('article', $value->slug);
        $instance->updated_at = $mod;
        $instance->body = $value->article_body;
        $instance->authorName = 'The Fitzwilliam Museum';
        $instance->exists = true; // tell this model is already exists, forcely
        $items[$key] = $instance; // assign this model to the collection
    }
    // dd($items);
    return $items;
  }

  public static function getFeedItems()
  {
    return self::feedItems();
  }
}
