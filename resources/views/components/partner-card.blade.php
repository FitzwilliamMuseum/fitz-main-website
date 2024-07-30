<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">

        
            @isset($image)
                <img class="card-img-top"
                     src="{{ $image['data']['thumbnails'][13]['url']}}"
                     alt="{{ $altTag }}"
                     loading="lazy"
                     width="{{ $image['data']['thumbnails'][13]['width'] }}"
                     height="{{ $image['data']['thumbnails'][13]['height'] }}"
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
                    @isset($url)
                        <a href="{{ $url }}" class="stretched-link">
                            {{ $title }}
                        </a>
                    @else
                        {{ $title }}
                    @endisset
                </h2>
                @isset($subtitle)
                    <p class="text-info">{{ $subtitle }}</p>
                @endisset
            </div>
        </div>
    </div>
</div>
