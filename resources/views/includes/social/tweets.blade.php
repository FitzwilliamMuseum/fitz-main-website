<div class="row">
  @foreach($tweets as $tweet)
  <div class="col-md-4 mb-3">

    <div class="card card-body h-100">
      @if(isset($tweet->extended_entities))
      @foreach($tweet->extended_entities as $entity)
        <img class="img-fluid twitter" src="{{ $entity[0]->media_url_https }}:small"
        width="680" height="672" loading="lazy" alt="An image from Twitter"/>
      @endforeach
      @else
        <img class="img-fluid twitter" src="https://pbs.twimg.com/profile_images/1057934206368710656/NE1KayiE.jpg"/>
      @endif
      <div class="container h-100">
        <div class="contents-label mb-3">
          <p>{!! Twitter::linkify($tweet->full_text) !!}</p>
        </div>
      </div>
      <p>Retweets: {{ $tweet->retweet_count }} Favourited: {{ $tweet->favorite_count }}</p>
      <a href="{{ Twitter::linkTweet($tweet) }}" class="btn btn-dark">Read more</a>
    </div>
  </div>
  @endforeach
</div>
