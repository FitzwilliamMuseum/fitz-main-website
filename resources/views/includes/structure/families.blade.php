<h3 class="lead">Story telling</h3>
<div class="row">
  @foreach($sessions['data'] as $session)
  <div class="col-md-4 mb-3">
    <div class="card  h-100">
      @if(isset($session['youtube_id']))
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" title="A YouTube video from the Fitzwilliam Museum"
          src="https://www.youtube.com/embed/{{$session['youtube_id']}}" frameborder="0"
          allowfullscreen></iframe>
      </div>
      @elseif(isset($session['vimeo_id']))
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" title="A Vimeo video from the Fitzwilliam Museum"
        src="https://player.vimeo.com/video/{{$session['vimeo_id']}}" frameborder="0"
        allowfullscreen></iframe>
      </div>
      @endif
      <div class="card-body ">
        <div class="contents-label mb-3">
          <h3 class="lead">{{ $session['title'] }}</h3>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
