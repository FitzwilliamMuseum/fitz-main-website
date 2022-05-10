<div class="col-md-4 mb-3">
    <div class="card h-100">
        @if(isset($tweet->extended_entities))
            @foreach($tweet->extended_entities as $entity)
                <div class="ratio ratio-1x1">
                    <a href="{{ Twitter::linkTweet($tweet) }}">
                        <img class="img-fluid" src="{{ $entity[0]->media_url_https }}:small"
                             width="680" height="672" loading="lazy" alt="An image from Twitter"/>
                    </a>
                </div>
            @endforeach
        @else
            <a href="{{ Twitter::linkTweet($tweet) }}">
                <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/portico.jpg"/>
            </a>
        @endif
        <div class="card-body">
            <div class="contents-label mb-3">
                <p>{!! Twitter::linkify($tweet->full_text) !!}</p>
                <p>Retweets: {{ $tweet->retweet_count }} Favourited: {{ $tweet->favorite_count }}</p>
            </div>
        </div>
    </div>
</div>
