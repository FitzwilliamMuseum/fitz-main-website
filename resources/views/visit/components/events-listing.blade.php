@php
    $heading = '';
    $footer_link = null;
    if(isset($page)) {
        $heading = isset($page['exhibitions_listing_heading']) ? $page['exhibitions_listing_heading'] : null;
        $footer_link = isset($page['exhibitions_listing_link']) ? $page['exhibitions_listing_link'][0] : null;
    }
    elseif(isset($settings)) {
        $heading = isset($settings['exhibitions_listing_heading']) ? $settings['exhibitions_listing_heading'] : null;
        $footer_link = isset($settings['exhibitions_listing_link']) ? $settings['exhibitions_listing_link'][0] : null;
    }
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
                        {{-- @dd($events) --}}
                        @foreach($events['data'] as $event)
                            <li class="splide__slide events-listing__event-card" data-component="card">
                                <div class="event-card__image">
                                    @php
                                        $listingImage = !empty($event['listing_image']) ? $event['listing_image'] : null;
                                        $listingImageAlt = !empty($event['listing_image_alt']) ? $event['listing_image_alt'] : null;

                                        if(empty($listingImage) && !empty($event['hero_image'])) {
                                            $image = $event['hero_image'];
                                            $altTag = $event['hero_image_alt_text'];
                                        }
                                    @endphp
                                    @if(!empty($listingImage))
                                        <img class="card-img-top"
                                            src="{{ $listingImage['data']['thumbnails'][13]['url'] }}"
                                            alt="{{ !empty($listingImageAlt) ? $listingImageAlt : '' }}"
                                            width="{{ $listingImage['data']['thumbnails'][13]['width'] }}"
                                            height="{{ $listingImage['data']['thumbnails'][13]['height'] }}"
                                            loading="lazy"
                                        />
                                    @elseif(isset($image))
                                        <img class="card-img-top"
                                            src="{{ $image['data']['thumbnails'][13]['url'] }}"
                                            alt="{{ !empty($altTag) ? $altTag : '' }}"
                                            width="{{ $image['data']['thumbnails'][13]['width'] }}"
                                            height="{{ $image['data']['thumbnails'][13]['height'] }}"
                                            loading="lazy"
                                        />
                                    @else
                                        <img class="card-img-top"
                                            src="{{ env('MISSING_IMAGE_URL') }}"
                                            alt="A stand in image for {{ $event['exhibition_title'] }}"
                                            loading="lazy"
                                        />
                                    @endif
                                </div>
                                <div class="event-card__text">
                                    @php
                                        $heading = isset($event['exhibition_title']) ? $event['exhibition_title'] : null;
                                        $start_date = isset($event['exhibition_start_date']) ? $event['exhibition_start_date'] : null;
                                        $end_date = isset($event['exhibition_end_date']) ? $event['exhibition_end_date'] : null;
                                        $optional_text = (isset($event['ticketed']) && !$event['ticketed']) ? 'Free entry' : null;
                                        $tag = isset($event['tag']) ? $event['tag'] : null;
                                        $linked_tag = true;

                                        if(isset($event['ticketed']) && $event['ticketed']) {
                                            $tag = 'Ticketed exhibition';
                                            $linked_tag = false;
                                        }
                                    @endphp
                                    @if(!empty($heading))
                                        <h3 class="streched-link">
                                            <a href="plan-your-visit/exhibitions/{{ $event['slug'] }}">
                                                {{ $heading }}
                                            </a>
                                        </h3>
                                    @endif
                                    @if(!empty($start_date))
                                        <p>{{ Carbon\Carbon::parse($start_date)->format('j F Y') }} – {{ Carbon\Carbon::parse($end_date)->format('j F Y') }}</p>
                                    @endif
                                    @if(!empty($optional_text))
                                        <p>{{ $optional_text }}</p>
                                    @endif
                                    @if(!empty($tag))
                                        @if($linked_tag)
                                            <a class="tag" href="/events/{{ $tag }}">{{ $tag }}</a>
                                        @else
                                            <p class="tag">{{ $tag }}</p>
                                        @endif
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </div>
                </div>
            </section>
            @if(!empty($footer_link && !empty($footer_link['link_url'])))
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
