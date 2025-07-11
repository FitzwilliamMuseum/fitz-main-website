<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link" href="{{ $file['data']['full_url'] }}">
                    {{ $title }}
                </a>
            </h3>
            <p>@mime($file['type']) - @humansize($file['filesize'])</p>
            <p class="text-info">
                Document type: {{ ucfirst($type) }}
            </p>
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            @isset($image['data']['thumbnails'])
                <img src="{{ $image['data']['thumbnails'][13]['url'] }}" alt="" loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @endisset
        </div>
    </div>
</div>
