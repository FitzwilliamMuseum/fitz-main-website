<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h2 class="card__heading"><a class="card__link" href="{{ route($route, $params) }}">{{ $title }}</a>
            </h2>
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            <img src="{{ isset($image) ? $image : env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
        </div>
    </div>
</div>
