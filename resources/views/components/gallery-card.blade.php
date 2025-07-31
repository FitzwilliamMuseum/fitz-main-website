<div class="col-md-4 mb-3 {{ !empty($source) && $source == 'homepage' ? 'container-home-card' : '' }}">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link" href="{{ route($route, $params) }}">
                    {{ $title }}
                </a>
            </h3>
            @if ($status)
                @foreach ($status as $stat)
                    <span class="badge bg-dark mb-1">{{ $stat }}</span>
                @endforeach
            @endif
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            @isset($image)
                <img src="{{ $image['data']['thumbnails'][13]['url'] }}" alt="" loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @endisset
        </div>
    </div>
</div>
