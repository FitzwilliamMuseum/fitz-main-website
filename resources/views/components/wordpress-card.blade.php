<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @isset($image)
            <a href="{{ $url }}">
                <img class="card-img-top" src="{{ $image}}"
                     alt="{{ $title }}"
                     loading="lazy"
                />
            </a>
        @else
            <a href="{{ $url }}">
                <img class="card-img-top"
                     src="{{ env('MISSING_IMAGE_URL') }}"
                     alt="A stand in image for {{ $title }}"
                     loading="lazy"
                />
            </a>
        @endisset
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h2>
                    <a href="{{ $url }}" class="stretched-link">
                        {{ $title }}
                    </a>
                </h2>
            </div>
        </div>
    </div>
</div>
