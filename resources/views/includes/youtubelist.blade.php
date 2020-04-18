<div class="row">
  @foreach($videoList as $video)
  <div class="col-md-4 mb-3">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item "
      src="https://www.youtube.com/embed/{{$video->id->videoId}}" frameborder="0"
      allowfullscreen></iframe>
    </div>
  </div>
  @endforeach
</div>
