<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @if(empty($artists['image']))
        <a href="{{ route('exhibition.ttn.artist', $artists['slug']) }}">
                <img class="card-img-top"
                     src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                     alt="A stand in image for {{ $artists['display_name'] }}"
                     loading="lazy"
                />
            </a>
        @else
            <a href="{{ route('exhibition.ttn.artist', $artists['slug']) }}">
                <img class="card-img-top"
                     src="{{ $artists['image']['data']['thumbnails'][2]['url'] }}"
                     alt="{{ $artists['display_name'] }}"
                     width="{{ $artists['image']['data']['thumbnails'][2]['width'] }}"
                     loading="lazy"
                />
            </a>
        @endif
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h3>
                    <a href="{{ route('exhibition.ttn.artist', $artists['slug']) }}" class="stretched-link">
                        {{ $artists['display_name'] }}
                    </a>
                </h3>
                <p class="text-info">{{ $artists['year_of_birth'] }} -{{ $artists['year_of_death'] }}</p>
            </div>
        </div>
    </div>
</div>
