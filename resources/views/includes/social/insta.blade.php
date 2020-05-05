<div class="row">
@foreach($insta as $media)
<div class="col-md-4 mb-3">
  <div class="card card-body h-100">
    <a href="{{ $media->getLink() }}"><img class="img-fluid"
      src="{{ $media->getImageThumbnailUrl() }}" alt="{{ substr(strip_tags(htmlspecialchars_decode($media->getCaption())),0,100) }}..."/></a>
    <div class="container h-100">

      <!-- <div class="contents-label mb-3">
        <p class="card-text">{{ substr(strip_tags(htmlspecialchars_decode($media->getCaption())),0,200) }}...</p>
      </div> -->
    </div>
    <!-- <p>Interactions: {{ $media->getCommentsCount() }} Favourited: {{$media->getLikesCount()}} </p> -->
    <!-- <a href="{{ $media->getLink() }}" class="btn btn-dark">Read more</a> -->
  </div>
</div>
@endforeach
</div>
