<div class="col-md-4 mb-3" data-component="card">
    <div class="card card-fitz h-100">
        @isset($image)
            <img class="card-img-top" src="{{ $image['data']['thumbnails'][13]['url']}}"
                    alt="{{ $altTag }}"
                    width="{{ $image['data']['thumbnails'][13]['width'] }}"
                    height="{{ $image['data']['thumbnails'][13]['height'] }}"
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
                <h2>
                    <a href="{{ route($route, $params) }}" class="stretched-link">
                        {{ $title }}
                    </a>
                </h2>
                @isset($stop)
                    <p class="text-info">
                        Stop number: {{ $stop }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
