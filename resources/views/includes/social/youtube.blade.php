@if($page['youtube_id'])
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" title="A YouTube video from the Fitzwilliam Museum"
      src="https://www.youtube.com/embed/{{$page['youtube_id']}}"
      allowfullscreen></iframe>
    </div>
  </div>
@endif
