@if($page['youtube_id'])
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item "
    src="https://www.youtube.com/embed/{{$page['youtube_id']}}" frameborder="0"
    allowfullscreen></iframe>
  </div>
</div>
@endif
