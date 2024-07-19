<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @if(empty($artists['image']))
            <img class="card-img-top"
                    src="{{ env('MISSING_IMAGE_URL') }}"
                    alt="A stand in image for {{ $artists['display_name'] }}"
                    loading="lazy"
            />
        @else
            <img class="card-img-top"
                    src="{{ $artists['image']['data']['thumbnails'][13]['url'] }}"
                    alt="{{ $artists['display_name'] }}"
                    width="{{ $artists['image']['data']['thumbnails'][13]['width'] }}"
                    height="{{ $artists['image']['data']['thumbnails'][13]['height'] }}"
                    loading="lazy"
            />
        @endif
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h2>
                    <a href="{{ route('exhibition.ttn.artist', $artists['slug']) }}" class="stretched-link">
                        {{ $artists['display_name'] }}
                    </a>
                </h2>
                <p class="text-info">{{ $artists['year_of_birth'] }} -{{ $artists['year_of_death'] }}</p>
            </div>
        </div>
    </div>
</div>
