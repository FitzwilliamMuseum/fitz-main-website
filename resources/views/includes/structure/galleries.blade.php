<div class="container mt-3">
  <h2 class="lead">
    Discover our galleries
  </h2>
  <div class="row">
    @foreach($galleries['data'] as $gallery)
      <div class="col-md-4 mb-3">
        <div class="card card-fitz h-100">
          @if(!is_null($gallery['hero_image']))
            <a href="{{ route('gallery',[$gallery['slug']]) }}"><img class="img-fluid" src="{{ $gallery['hero_image']['data']['thumbnails'][4]['url']}}"
            alt="A highlight image for {{ $gallery['gallery_name'] }}" loading="lazy"
            width="{{ $gallery['hero_image']['data']['thumbnails'][4]['width'] }}"
            height="{{ $gallery['hero_image']['data']['thumbnails'][4]['height'] }}"/></a>
          @endif
          <div class="card-body h-100">
            <div class="contents-label mb-3">
              <h3 class="lead">
                <a href="{{ route('gallery',[$gallery['slug']]) }}">{{ $gallery['gallery_name'] }}</a>
              </h3>
              {{-- @if($gallery['gallery_status'])
              @foreach($gallery['gallery_status'] as $status)
                <span class="badge badge-wine mb-1">{{$status}}</span>
              @endforeach
              @endif --}}
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
