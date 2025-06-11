<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link" href="{{ $url }}">
                    {{ $title }}
                </a>
            </h3>
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            @isset($image)
                <img src="{{ $image }}" alt="" loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @endisset
        </div>
    </div>
</div>
