<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        <a href="{{ env('SHOPIFY_FME_PROTOCOL') }}{{ env('SHOPIFY_FME_LIVE_URL') }}{{ env('SHOPIFY_FME_CATALOGUE') }}{{ $result['handle'] }}">
            <img class="card-img-top" src="{{ str_replace('.jpg','_300x300.jpg',$result['image']['src']) }}"
                 alt="A product image depicting {{ $result['image']['src'] }}"
                 loading="lazy"
            />
        </a>

        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h3>
                    <a href="{{ env('SHOPIFY_FME_PROTOCOL') }}{{ env('SHOPIFY_FME_LIVE_URL') }}{{ env('SHOPIFY_FME_CATALOGUE') }}{{ $result['handle'] }}"
                       class="stretched-link">
                        {{ $result['title'] }}
                    </a>
                </h3>
                <p class="text-info">£{{ number_format((float)$result['variants'][0]['price'], 2, '.', '') }}</p>
            </div>
        </div>
    </div>
</div>
