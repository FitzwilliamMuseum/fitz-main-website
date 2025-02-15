<div class="col-md-3 mb-3" data-component="card">
    <div class="card card-fitz h-100">
        @isset($donate['hero_image'])
            <img class="card-img-top"
                    src="{{ $donate['hero_image']['data']['thumbnails'][13]['url']}}"
                    alt="{{ $donate['hero_image_alt_text'] }}"
                    loading="lazy"
                    width="{{ $donate['hero_image']['data']['thumbnails'][13]['width'] }}"
                    height="{{ $donate['hero_image']['data']['thumbnails'][13]['height'] }}"

            />
        @else
            <img class="card-img-top"
                    src="{{ env('MISSING_IMAGE_URL') }}"
                    alt="A stand in image for {{ $donate['title'] }}"
                    loading="lazy"
            />
        @endisset
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h3>
                    <a href="{{ $donate['url'] }}" class="stretched-link">
                        {{ $donate['title'] }}
                    </a>
                </h3>
                @isset($donate['subtitle'])
                    <p class="text-info">{{ $donate['subtitle'] }}</p>
                @endisset
            </div>
        </div>
    </div>
</div>
