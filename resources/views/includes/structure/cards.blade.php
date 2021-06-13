@foreach ($data as $data)
<div class="col-md-4 mb-3">
  <div class="card h-100 ">
    @if(!is_null($data['hero_image']))
    <a href="{{ route('landing-section', [$data['section'],$data['slug']]) }}"><img class="img-fluid" src="{{ $data['hero_image']['data']['thumbnails'][4]['url']}}"
    alt="{{ $data['hero_image_alt_text']}}" loading="lazy"
    width="{{ $data['hero_image']['data']['thumbnails'][4]['width'] }}"
    height="{{ $data['hero_image']['data']['thumbnails'][4]['height'] }}"/></a>
    @endif
    <div class="card-body h-100">
      <div class="contents-label mb-3">
        <h3 class="lead">
          <a href="{{ route('landing-section', [$data['section'],$data['slug']]) }}">{{ $data['title']}}</a>
        </h3>
      </div>
      </div>
    </div>
  </div>
@endforeach
