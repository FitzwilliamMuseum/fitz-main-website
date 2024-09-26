<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @isset($result['thumbnail'][0])
            <img class="card-img-top" src="{{ str_replace('.jpg?v','_300x300.jpg?v',$result['thumbnail'][0]) }}"
                    alt="A product image depicting {{ $result['title'][0] }}"
                    loading="lazy"
            />
        @else
            <img class="card-img-top"
                    src="{{ env('MISSING_IMAGE_URL') }}"
                    alt="A stand in product image depicting {{ $result['title'][0] }}"
                    loading="lazy"
            />
        @endisset
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h3>
                    <a href="{{ $result['url'][0] }}" class="stretched-link">
                        {{ $result['title'][0] }}
                    </a>
                </h3>
                <p class="text-dark">&pound;{{ number_format((float)$result['price'][0], 2, '.', '') }}</p>
            </div>
        </div>
    </div>
</div>
