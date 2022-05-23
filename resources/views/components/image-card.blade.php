<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @isset($image)
            <a href="{{ route($route, $params) }}">
                <img class="card-img-top"
                     src="{{ $image['data']['thumbnails'][13]['url']}}"
                     alt="{{ $altTag }}"
                     width="100%"
                     height="100%"
                     loading="lazy"
                />
            </a>
        @else
            <a href="{{ route($route, $params) }}">
                <img class="card-img-top"
                     src="{{ env('MISSING_IMAGE_URL') }}"
                     alt="A stand in image for {{ $title }}"
                     loading="lazy"
                />
            </a>
        @endisset
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h3>
                    <a href="{{ route($route, $params) }}" class="stretched-link">
                        {{ $title }}
                    </a>
                </h3>
            </div>
        </div>
    </div>
</div>
