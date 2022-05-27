@php
    if(!isset($card)){
      $card = '4';
    }
@endphp
@foreach ($data as $datum)
    <div class="col-md-{{$card}} mb-3">
        <div class="card h-100 ">
            @if(!is_null($datum['hero_image']))
                <a href="{{ route('landing', [$datum['section']]) }}">
                    <img class="card-img-top" src="{{ $datum['hero_image']['data']['thumbnails'][2]['url']}}"
                         alt="{{ $datum['hero_image_alt_text']}}" loading="lazy"
                         width="{{ $datum['hero_image']['data']['thumbnails'][2]['width'] }}"/>
                </a>
            @endif
            <div class="card-body h-100">
                <div class="contents-label mb-3">
                    <h2>
                        <a class="stretched-link"
                           href="{{ route('landing', [$datum['section']]) }}">{{ $datum['title']}}</a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endforeach
