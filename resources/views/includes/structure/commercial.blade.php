@php
    if (!isset($card)) {
        $card = '4';
    }
@endphp
@foreach ($data as $datum)
    <div class="col-md-{{ $card }} mb-3">
        <div class="card" data-component="card">
            <div class="l-box l-box--no-border card__text">
                <h2 class="card__heading">
                    <a class="card__link" href="{{ route('landing', [$datum['section']]) }}">{{ $datum['title'] }}</a>
                </h2>
            </div>
            @if (!is_null($datum['hero_image']))
                <div class="l-frame l-frame--3-2 card__image">
                    <img src="{{ $datum['hero_image']['data']['thumbnails'][2]['url'] }}" alt="" loading="lazy" />
                </div>
            @endif
        </div>
    </div>
@endforeach
