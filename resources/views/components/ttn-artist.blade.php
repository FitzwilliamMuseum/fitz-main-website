<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @if(empty($artist['image']))
        <a href="{{ route('exhibition.ttn.artist', $artist['slug']) }}">
                <img class="card-img-top"
                     src="{{ env('MISSING_IMAGE_URL') }}"
                     alt="A stand in image for {{ $artist['display_name'] }}"
                     loading="lazy"
                />
            </a>
        @else
            <a href="{{ route('exhibition.ttn.artist', $artist['slug']) }}">
                <img class="card-img-top"
                     src="{{ $artist['image']['data']['thumbnails'][13]['url'] }}"
                     alt="{{ $artist['display_name'] }}"
                     width="{{ $artist['image']['data']['thumbnails'][13]['width'] }}"
                     height="{{ $artist['image']['data']['thumbnails'][13]['height'] }}"
                     loading="lazy"
                />
            </a>
        @endif
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h2>
                    <a href="{{ route('exhibition.ttn.artist', $artist['slug']) }}" class="stretched-link">
                        {{ $artist['display_name'] }}
                    </a>
                </h2>
                <p class="text-info">{{ $artist['year_of_birth'] }} -{{ $artist['year_of_death'] }}</p>
            </div>
        </div>
    </div>
</div>
