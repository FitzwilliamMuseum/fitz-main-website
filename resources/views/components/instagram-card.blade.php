<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link" href="{{ route('instagram.story', $instagram['slug']) }}">
                    {{ $instagram['title'] }}
                </a>
            </h3>
            <p class="text-info">
                {{ Carbon\Carbon::parse($instagram['date_posted'])->format('j F Y') }}
            </p>
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            @if(!empty($instagram['hero_image']))
                <img src="{{ $instagram['hero_image']['data']['thumbnails'][13]['url']}}"
                     alt=""
                     loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}"
                     alt=""
                     loading="lazy" />
            @endif
        </div>
    </div>
</div>
