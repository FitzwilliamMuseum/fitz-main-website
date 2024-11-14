    {{-- fiftyfifty --}}
    @if(!empty($component['50_50_content']))
        @php
            $fiftyfifty_content = $component['50_50_content'];
        @endphp
        <div class="container container-home-cards container-support-cards">
            <div class="row row-home row-support">
                @if(!empty($fiftyfifty_content))
                    @foreach($fiftyfifty_content as $card_content)
                        @php
                            if(!empty($card_content['image_id'])) {
                                if(!empty($page['50_50_content_images'])) {
                                    foreach($page['50_50_content_images'] as $image_block) {
                                        if($image_block['content_image_id']['id'] == $card_content['image_id']) {
                                            $image_asset = $image_block['content_image_id'];
                                        }
                                    }
                                }
                            }
                        @endphp
                        <div class="col-md-4 mb-3 container-home-card container-support-card"
                            @if(!empty($card_content['card_link']))
                                data-component="card"
                            @endif
                        >
                            <div class="card {{ !empty($card_content['card_link']) ? 'card-fitz' : '' }} h-100">
                                @if(!empty($image_asset))
                                    <img class="card-img-top" src="{{ $image_asset['data']['thumbnails'][10]['url'] }}" alt="{{ !empty($image_asset['data']['description']) ? $image_asset['data']['description'] : '' }}" width="416" height="416" load="lazy">
                                @else
                                    <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" class="card-img-top" width="416" height="416" load="lazy">
                                @endif
                                @if(!empty($card_content))
                                    <div class="card-body h-100">
                                        <div class="contents-label mb-3">
                                            @if(!empty($card_content['heading']))
                                                <h2>
                                                    @if(!empty($card_content['card_link']))
                                                        <a href="{{ $card_content['card_link'] }}">
                                                            {{ $card_content['heading'] }}
                                                        </a>
                                                    @else
                                                        {{ $card_content['heading'] }}
                                                    @endif
                                                </h2>
                                            @endif
                                            @if(!empty($card_content['body']))
                                                <p class="text-dark">
                                                    {{ $card_content['body'] }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif
