<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link" href="{{ $result['url'][0] }}">
                    {{ $result['title'][0] }}
                </a>
            </h3>
            <p class="text-dark">&pound;{{ number_format((float) $result['price'][0], 2, '.', '') }}</p>
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            @isset($result['thumbnail'][0])
                <img src="{{ str_replace('.jpg?v', '_300x300.jpg?v', $result['thumbnail'][0]) }}" alt=""
                    loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @endisset
        </div>
    </div>
</div>
