@php
    $components = $page['page_components'];
@endphp

{{-- {{ dd($components) }} --}}
@foreach($components as $component)
    @if (is_array($component))
        @if(!empty($component['image']))
            @php
                if(!empty($component['image'][0]['image_url'])) {
                    $image_url = $component['image_url'];
                }
                if(!empty($component['image'][0]['image_caption'])) {
                    $caption = $component['image'][0]['image_caption'];
                }
            @endphp
            <figure class="container featured_image">
                @if(isset($image_url))
                    <img src="{{ $image_url['data']['url'] }}" alt="{{ isset($image_url['data']['description']) ? $block_image['data']['description'] : '' }}" load="lazy">
                @else
                    <img src="https://s3-alpha-sig.figma.com/img/9b5c/a213/5f4121d542313bc48aaacd188c7011a5?Expires=1707696000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=D9Xr-K7JHd5b6igceO5jBy~Iodb7xNux8u9ckq61spUlZ-XnHcWd3sC~J6WeOnfXb-HhwryBtBnI4nQxcZPMM-IyDkCG1uzsnzNA~DIUI8LBaviKvVWD15YdfxKr7DUHy-knKHhqo9aO3ra2uvPTNZgTM5Z1wHtJF1jBAoMGOuHZ0rdLvwlDYnXZhda74EOdvKLeCkAzCRSNAz7GZpjvqH7eF4UCPmqajb83QOzFiyJ7EUUSfcRzmUlvIpPcZcpHfu3or8-yL8zT9G5qJa4xdUJ7sTcRNgx-YC46O17Vt2KV6ax5BGyahNxahrC~r4Y7SuRpHrWQ0AvC22O~fV2uCg__" load="lazy" alt="">
                @endif
                <figcaption>{{ isset($caption) ? $caption : '' }}{{ $caption }}</figcaption>
            </figure>
        @elseif(!empty($component['content_block']))
            @php
                if(!empty($component['content_block'][0]['content'])) {
                    $content_block_body = $component['content_block'][0]['content'];
                }
                if(!empty($component['content_block'][0]['cta'])) {
                    $content_block_link_text = $component['content_block'][0]['cta'][0]['link_text'];
                    $content_block_link = $component['content_block'][0]['cta'][0]['link'];
                }
            @endphp
            @if(isset($content_block_body))
                <div class="container mx-auto col-max-800 support-content-block-component support-cta">
                    @markdown($content_block_body)
                    @if(isset($content_block_link))
                        <a href="{{ $content_block_link }}" class="cta-btn">
                            {{ $content_block_link_text }}
                            @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                        </a>
                    @endif
                </div>
            @endif
        @elseif(!empty($component['banner_positioning']))
            @php
                if(!empty($page['banner_heading'])) {
                    $banner_heading = $page['banner_heading'];
                }
                if(!empty($page['banner_subheading'])) {
                    $banner_subheading = $page['banner_subheading'];
                }

                if(!empty($page['banner_cta_text'])) {
                    $banner_link_text = $page['banner_cta_text'];
                }
                if(!empty($page['banner_cta_link'])) {
                    $banner_link = $page['banner_cta_link'];
                }
            @endphp
            <div class="container container-fluid">
                <div class="component-ff">
                    <div class="content">
                        <div class="container">
                            @if(isset($banner_heading))
                                <h3>{{ $banner_heading }}</h3>
                            @endif
                            @if(isset($banner_subheading))
                                <p>{{ $banner_subheading }}</p>
                            @endif
                            @if(isset($banner_link))
                                <a href="{{ $banner_link }}" class="nav-link">
                                    {{ $banner_link_text }}
                                    @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#000'])
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="image">
                        @if(isset($banner_image))
                        <img src="{{ $banner_image['data']['url'] }}"
                            alt="{{ $banner_image_alt_text }}">
                        @else
                            <img src="https://www.figma.com/file/xj7JfJKleVQrFYzW9Tk6wA/image/543672b12c0d99c9dd327de4acf977f9c89094e6" alt="">
                        @endif
                    </div>
                </div>
            </div>
        @elseif(!empty($component['accordion_component']))
            @php
                $accordion_heading = $component['accordion_component'][0]['accordion_heading']
            @endphp
            <div class="container-fluid col-max-800 faq">
                <div class="container faq-container">
                    <h3 class="faq-title">{{ $accordion_heading }}</h3>
                    <div class="accordion mt-2" id="accordionDirections">
                        @php
                            $iteration = 1;
                            $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                        @endphp
                        @foreach($component['accordion_component'][0]['accordion'] as $accordion_item)
                            @php
                                $iterationNumber = $f->format($iteration);
                                if(!empty($accordion_item['Heading'])) {
                                    $heading = $accordion_item['Heading'];
                                }
                                if(!empty($accordion_item['Body'])) {
                                    $body = $accordion_item['Body'];
                                }
                            @endphp
                            <div class="card faq-card">
                                <div class="card-header faq-card-header" id="heading{{ ucfirst(trans($iterationNumber)) }}">
                                    <button class="faq-card-btn" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ ucfirst(trans($iterationNumber)) }}" aria-expanded="false" aria-controls="collapse">
                                        {{ $heading }}
                                        @svg('fas-chevron-down', ['width' => '25px', 'height' => '25px'])
                                    </button>
                                </div>
                                <div id="collapse{{ ucfirst(trans($iterationNumber)) }}" class="collapse" aria-labelledby="heading{{ ucfirst(trans($iterationNumber)) }}"
                                    data-parent="#accordionDirections">
                                    <div class="card-body">
                                        @markdown($body)
                                    </div>
                                </div>
                            </div>
                            @php
                                $iteration = $iteration += 1;
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>
            @elseif(!empty($component['cta_cards']))
                <div class="payment-grid">
                    <ul class="grid-container">
                        @foreach($component['cta_cards'] as $card)
                            <li class="grid-card">
                                <h3>{{ $card['heading'] }}</h3>
                                <p>{{ $card['subheading'] }}</p>
                                <p><span>{{ $card['highlighted_text'] }}{{ $card['highlighted_subtext'] }}</span></p>
                                <a href="{{ $card['cta_link'] }}">
                                    {{ $card['cta_text'] }}
                                    @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
        @elseif(!empty($component['video']))
            <div class="container featured_video mx-auto">
                <video controls width="100%">
                    <source src="{{ $component['video'] }}" type="video/webm">
                    <source src="{{ $component['video'] }}" type="video/mp4">
                        Download the
                    <a href="{{ $component['video'] }}">WEBM</a>
                    or
                    <a href="{{ $component['video'] }}">MP4</a>
                    video.
                </video>
            </div>
        @endif
    @endif
@endforeach