<div class="container mt-3">
<h3 class="display-5">
  <a href="{{ route('exhibitions')}}">Current exhibitions and new displays</a>
</h3>
<div class="row">
  @foreach($exhibitions['data'] as $exhibit)
  <div class="col-md-4 mb-3">
    <div class="card  h-100">
      @if(!is_null($exhibit['hero_image']))
        <a href="{{ route('exhibition',$exhibit['slug']) }}"><img class="img-fluid" src="{{ $exhibit['hero_image']['data']['thumbnails'][4]['url']}}" loading="lazy"
        alt="{{ $exhibit['hero_image_alt_text'] }}"
        width="{{ $exhibit['hero_image']['data']['thumbnails'][4]['width'] }}"
        height="{{ $exhibit['hero_image']['data']['thumbnails'][4]['height'] }}"
        /></a>
      @endif
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3 class="lead">
            <a href="{{ route('exhibition',$exhibit['slug']) }}">{{ $exhibit['exhibition_title']}}</a>
          </h3>
          @if($exhibit['ticketed'] ==1)
            <p class="text-info">Ticket and timed entry</p>
            <a class="btn btn-dark" href="https://tickets.museums.cam.ac.uk/overview/{{ $exhibit['tessitura_string'] }}">Book now</a>
          @else
            <p class="text-info">Included in General admission</p>
          @endif
          <p class="text-info">
            {{  Carbon\Carbon::parse($exhibit['exhibition_start_date'])->format('l dS F Y') }} to
            {{  Carbon\Carbon::parse($exhibit['exhibition_end_date'])->format('l dS F Y') }}
          </p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
