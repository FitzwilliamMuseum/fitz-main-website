<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link" href="{{ $release['file']['data']['full_url'] }}">
                    {{ $release['title'] }}
                </a>
            </h3>
            <p>{{ substr(strip_tags(htmlspecialchars_decode($release['body'])), 0, 200) }}...</p>
            <p class="text-info">
                {{ Carbon\Carbon::parse($release['release_date'])->format('j F Y') }}
            </p>
            <p>@mime($release['file']['type']) - @humansize($release['file']['filesize'])</p>
            <a href="{{ $release['file']['data']['full_url'] }}" class="btn d-block btn-dark">
                Download file
            </a>
        </div>

        <div class="l-frame l-frame--3-2 card__image">
            @if (!is_null($release['hero_image']))
                <img src="{{ $release['hero_image']['data']['thumbnails'][13]['url'] }}"
                    alt="{{ $release['hero_image_alt_text'] }}" loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @endif
        </div>
    </div>
</div>
