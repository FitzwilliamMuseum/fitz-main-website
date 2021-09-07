<?php

namespace App\Models;
use App\DirectUs;
use Carbon\Carbon;

// use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class ResearchProjectsItem extends Model implements Feedable
{
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

  public static function feedItems()
  {
    $api = new DirectUs;
    $api->setEndpoint('research_projects');
    $api->setArguments(
      $args = array(
          'fields' => '*.*.*.*',
          'fields' => 'id,title,summary,project_overview,slug,created_on',
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
        $instance->id = route('article', $value->slug);
        $instance->title = $value->title;
        $instance->summary = $value->summary;
        $instance->link = route('research-project', $value->slug);
        $instance->updated_at = Carbon::parse($value->created_on);
        $instance->body = $value->project_overview;
        $instance->authorName = 'The Fitzwilliam Museum';
        $instance->exists = true; // tell this model is already exists, forcely
        $items[$key] = $instance; // assign this model to the collection
    }
    return $items;
  }

  public static function getFeedItems()
  {
    return self::feedItems();
  }
}
