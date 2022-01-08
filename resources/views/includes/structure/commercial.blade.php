@php
  if(!isset($card)){
    $card = '4';
  }
@endphp
@foreach ($data as $data)
<div class="col-md-{{$card}} mb-3">
  <div class="card h-100 ">
    @if(!is_null($data['hero_image']))
      <a href="{{ route('landing', [$data['section']]) }}">
        <img class="card-img-top" src="{{ $data['hero_image']['data']['thumbnails'][2]['url']}}"
      alt="{{ $data['hero_image_alt_text']}}" loading="lazy"
      width="{{ $data['hero_image']['data']['thumbnails'][2]['width'] }}"/>
    </a>
    @endif
    <div class="card-body h-100">
      <div class="contents-label mb-3">
        <h3>
          <a class="stretched-link" href="{{ route('landing', [$data['section']]) }}">{{ $data['title']}}</a>
        </h3>
      </div>
      </div>
    </div>
  </div>
@endforeach
