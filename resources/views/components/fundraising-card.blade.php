<div class="col-md-3 mb-3">
    <div class="card card-fitz h-100">
        @isset($donate['hero_image'])
            <a href="{{ $donate['url'] }}">
                <img class="card-img-top" src="{{ $donate['hero_image']['data']['thumbnails'][2]['url']}}"
                     alt="{{ $donate['hero_image_alt_text'] }}"
                     loading="lazy" width="{{ $donate['hero_image']['data']['thumbnails'][2]['width'] }}"/>
            </a>
        @else
            <a href="{{ $donate['url'] }}">
                <img class="card-img-top"
                     src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                     alt="A stand in image for {{ $donate['title'] }}"
                     loading="lazy"/>
            </a>
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
