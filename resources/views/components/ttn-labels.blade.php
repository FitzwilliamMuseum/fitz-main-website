<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                @if (isset($labels['display_id_number']))
                    {{ $labels['display_id_number'] }}:
                @endif
                <a class="card__link" href="{{ route('exhibition.ttn.label', $labels['slug']) }}">
                    {{ $labels['title'] }}
                </a>
            </h3>
            <p class="text-info">
                {{ $labels['artist']['display_name'] ?? 'Anon' }}
            </p>
            <p class="text-black-50">
                {{ $labels['institution'] ?? 'Private collection' }}
            </p>
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            @if (!empty($labels['image']))
                <img src="{{ $labels['image']['data']['thumbnails'][13]['url'] }}" alt="" loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @endif
        </div>
    </div>
</div>
