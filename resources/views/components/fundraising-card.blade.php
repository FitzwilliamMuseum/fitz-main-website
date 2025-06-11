<div class="col-md-3 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link" href="{{ $donate['url'] }}">
                    {{ $donate['title'] }}
                </a>
            </h3>
            @isset($donate['subtitle'])
                <p class="text-info">{{ $donate['subtitle'] }}</p>
            @endisset
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            @isset($donate['hero_image'])
                <img src="{{ $donate['hero_image']['data']['thumbnails'][13]['url'] }}" alt="" loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @endisset
        </div>
    </div>
</div>
