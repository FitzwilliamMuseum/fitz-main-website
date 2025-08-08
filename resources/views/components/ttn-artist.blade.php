<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link" href="{{ route('exhibition.ttn.artist', $artists['slug']) }}">
                    {{ $artists['display_name'] }}
                </a>
            </h3>
            <p class="text-info">{{ $artists['year_of_birth'] }} - {{ $artists['year_of_death'] }}</p>
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            @if (empty($artists['image']))
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @else
                <img src="{{ $artists['image']['data']['thumbnails'][13]['url'] }}" alt="" loading="lazy" />
            @endif
        </div>
    </div>
</div>
