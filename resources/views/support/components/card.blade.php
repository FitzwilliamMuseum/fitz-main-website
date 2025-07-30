<div class="col-md-4 mb-3">
    <div class="card card-fitz card-fitz-support h-100" data-component="card">
        <div>
            @if (!empty($image_asset_url))
                <img class="card-img-top-support" src="{{ $image_asset_url }}" alt="{{ $image_asset_alt ?? '' }}"
                    width="{{ $image_asset_width ?? 416 }}" height="{{ $image_asset_height ?? 416 }}" loading="lazy">
            @else
                <img src="{{ $missing_image_url ?? env('MISSING_IMAGE_URL') }}" alt=""
                    class="card-img-top-support" width="{{ $image_asset_width ?? 416 }}"
                    height="{{ $image_asset_height ?? 416 }}" loading="lazy">
            @endif
        </div>
        <div class="card-body h-100">
            <div class="contents-label mb-3">
                @if (!empty($heading))
                    <h2>
                        @if (!empty($card_link))
                            <a href="{{ $card_link }}" class="stretched-link">
                                {{ $heading }}
                            </a>
                        @else
                            {{ $heading }}
                        @endif
                    </h2>
                @endif
                @if (!empty($sub_heading))
                    <p class="mb-2">{{ $sub_heading }}</p>
                @endif
                @if (!empty($body))
                    <p class="text-dark">
                        {{ $body }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
