<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @isset($image)
            <img class="card-img-top"
                    src="{{ $image['data']['thumbnails'][13]['url']}}"
                    alt="{{ $altTag }}"
                    width="{{ $image['data']['thumbnails'][13]['width']}}"
                    height="{{ $image['data']['thumbnails'][13]['height']}}"
                    loading="lazy"
            />
        @else
            <img class="card-img-top"
                    src="{{ env('MISSING_IMAGE_URL') }}"
                    alt="A stand in image for {{ $title }}"
                    loading="lazy"
            />
        @endisset
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h3 {{ Request::segment(1) === "learn-with-us" ? 'class=learning-heading' : '' }}>
                    <a href="{{ route($route, $params) }}" class="stretched-link">
                        {{ $title }}
                    </a>
                </h3>
            </div>
        </div>
    </div>
</div>
