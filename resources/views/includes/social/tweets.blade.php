<div class="row">
  @foreach($tweets as $tweet)
  <div class="col-md-4 mb-3">
    <div class="card card-body h-100">
      <img class="img-fluid" src="{{ $tweet->user->profile_banner_url}}"/>
      <div class="container h-100">
        <div class="contents-label mb-3">
          <blockquote class="mt-3"><p>{!! Twitter::linkify($tweet->text) !!}</p></blockquote>
          <p>Retweets: {{ $tweet->retweet_count }} Favourited: {{ $tweet->favorite_count }}</p>
        </div>
      </div>
      <a href="{{ Twitter::linkTweet($tweet) }}" class="btn btn-dark">Read more</a>
    </div>
  </div>
  @endforeach
</div>
