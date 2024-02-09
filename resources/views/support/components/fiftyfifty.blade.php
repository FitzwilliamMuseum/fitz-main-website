    {{-- fiftyfifty --}}
    @php
        if(!empty($page['50_50_content'])) {
            $fiftyfifty_content = $page['50_50_content'];
        }
        if(!empty($page['50_50_content_images'])) {
            $fiftyfifty_images = $page['50_50_content_images'];
        }
    @endphp
    <div class="container container-home-cards container-support-cards">
        <div class="row row-home row-support">
            @php $iterator = 0 @endphp
            @if(!empty($fiftyfifty_content))
                @foreach($fiftyfifty_content as $card_content)
                    <div class="col-md-4 mb-3 container-home-card container-support-card">
                        <div class="card card-fitz h-100">
                            @if(!empty($fiftyfifty_images))
                                <a href="" class="card-image">
                                    <img class="card-img-top"
                                        src="{{ $fiftyfifty_images[$iterator]['content_image_id']['data']['url'] }}"
                                        alt="{{ isset($fiftyfifty_images[$iterator]['content_image_id']['data']['description']) ? $fiftyfifty_images[$iterator]['content_image_id']['data']['description'] : '' }}"
                                        width="416" height="416" loading="lazy">
                                </a>
                            @endif
                            @if(!empty($card_content))
                                <div class="card-body h-100">
                                    <div class="contents-label mb-3">
                                        <h2>
                                            <a href="/">
                                                {{ $card_content['heading'] }}
                                            </a>
                                        </h2>
                                        <p class="text-dark">
                                            {{ $card_content['body'] }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @php $iterator = $iterator += 1; @endphp
                @endforeach
            @endif
        </div>
    </div>
