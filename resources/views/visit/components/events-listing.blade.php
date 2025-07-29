@php
    $heading = isset($component['listing_section'][0]['section_heading']) ? $component['listing_section'][0]['section_heading'] : null;
    $footer_link = isset($component['listing_section'][0]['section_link'][0]) ? $component['listing_section'][0]['section_link'][0] : null;
    if(isset($page)) {
        $images_source = isset($page['component_images']) ? $page['component_images'] : null;
    }
    elseif(isset($settings)) {
        $images_source = isset($settings['component_images']) ? $settings['component_images'] : null;
    }
    $events = $component['listing_section'][0]['listing'];
@endphp
<div class="events-listing">
    <div class="wrapper">
        <h2>{{ $heading }}</h2>
        @if(!empty($events))
            <section id="events-listing" class="events-listing__events splide">
                <div class="splide__arrows splide__arrows--ltr">
                    <button class="splide__arrow splide__arrow--prev carousel-control-prev" type="button"
                        aria-label="Previous slide" aria-controls="splide01-track">
                        <svg height="48" viewBox="0 0 48 48" width="64" xmlns="http://www.w3.org/2000/svg">
                            <path fill="black" d="M0 0h48v48h-48z"></path>
                            <path fill="white" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
                        </svg>
                    </button>
                    <button class="splide__arrow splide__arrow--next carousel-control-next" type="button"
                        aria-label="Next slide" aria-controls="splide01-track">
                        <svg height="48" viewBox="0 0 48 48" width="64" xmlns="http://www.w3.org/2000/svg">
                            <path fill="black" d="M0 0h48v48h-48z"></path>
                            <path fill="white" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
                        </svg>
                    </button>
                </div>
                <div class="splide__track">
                    <div class="splide__list">
                        @foreach($events as $event)
                            <div class="splide__slide events-listing__event-card" data-component="card">
                                @php
                                    $image_id = isset($event['image_id']) ? $event['image_id'] : null;
                                    $image_url = '';
                                    $heading = isset($event['heading']) ? $event['heading'] : null;
                                    $date = isset($event['date']) ? $event['date'] : null;
                                    $copy_line = isset($event['copy_line']) ? $event['copy_line'] : null;
                                    $tag = isset($event['tag']) ? $event['tag'] : null;
                                    $exhibition_slug = isset($event['exhibition_slug']) ? $event['exhibition_slug'] : null;
                                    $external_link = isset($event['external_link']) ? $event['external_link'] : null;
                                @endphp
                                @if(!empty($image_id))
                                    {{-- @dd($images_source) --}}
                                    <div class="event-card__image">
                                        @php
                                            if(!empty($images_source)) {
                                                foreach($images_source as $image_item) {
                                                    if($image_item['directus_files_id']['id'] == $image_id) {
                                                        $image_url = $image_item['directus_files_id']['data']['thumbnails'][13]['url'];
                                                    }
                                                }
                                            }
                                        @endphp
                                        @if(!empty($image_url))
                                            <img class="card-img-top" src="{{ $image_url }}" alt=""> {{-- Check what the handle for alt text is --}}
                                        @endif
                                    </div>
                                @endif
                                <div class="event-card__text">
                                    <h3 class="streched-link">
                                        @if(!empty($exhibition_slug))
                                            <a href="plan-your-visit/exhibitions/{{ $exhibition_slug }}">
                                                {{ $heading }}
                                            </a>
                                        @elseif(!empty($external_link) && empty($exhibition_slug))
                                            <a href="{{ $external_link }}">
                                                {{ $heading }}
                                            </a>
                                        @else
                                            {{ $heading }}
                                        @endif
                                    </h3>
                                    @if(!empty($date))
                                        <p>{{ $date }}</p>
                                    @endif
                                    @if(!empty($copy_line))
                                        <p>{{ $copy_line }}</p>
                                    @endif
                                    @if(!empty($tag))
                                        <p class="tag">{{ $tag }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @if(!empty($footer_link))
                <div class="events-listing__footer">
                    <a href="{{ $footer_link['link_url'] }}"
                    @if($footer_link['link_style'] == 'button') class="button--block button--white"@endif>
                        {{ $footer_link['link_text'] }}
                        @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#000'])
                    </a>
                </div>
            @endif
        @endif
    </div>
</div>
@pushOnce('fitzwilliamScripts')
    <script defer type="text/javascript" src="{{ asset("/js/events-carousel.js") }}"></script>
@endPushOnce
