<div class="col-md-4 mb-3">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link"
                    href="{{ env('SHOPIFY_FME_PROTOCOL') }}{{ env('SHOPIFY_FME_LIVE_URL') }}{{ env('SHOPIFY_FME_CATALOGUE') }}{{ $result['handle'] }}">
                    {{ $result['title'] }}
                </a>
            </h3>
            <p class="text-info">&pound;{{ number_format((float) $result['variants'][0]['price'], 2, '.', '') }}</p>
        </div>
        <div class="l-frame l-frame--3-2 card__image">
            <img src="{{ str_replace('.jpg?v', '_300x300.jpg?v', $result['image']['src']) }}" alt=""
                loading="lazy" />
        </div>
    </div>
</div>
