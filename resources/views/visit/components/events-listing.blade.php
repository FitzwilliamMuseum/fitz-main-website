@php 
    $heading = $data['heading'];
    $events = $data['events'];
    $footer_link = $data['footer_link'];
@endphp
<div class="events-listing">
    <div class="container">
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
                            <li class="splide__slide events-listing__event-card">
                                <div class="event-card__image">
                                    <img src="{{ env('MISSING_IMAGE_URL') }}" alt="">
                                </div>
                                <div class="event-card__text">
                                    @php
                                        $heading = isset($event['heading']) ? $event['heading'] : null;
                                        $date = isset($event['date']) ? $event['date'] : null;
                                        $optional_text = isset($event['optional_text']) ? $event['optional_text'] : null;
                                        $tag = isset($event['tag']) ? $event['tag'] : null;
                                    @endphp
                                    @if(!empty($heading))
                                        <h3>{{ $heading }}</h3>
                                    @endif
                                    @if(!empty($date))
                                        <p>{{ $date }}</p>
                                    @endif
                                    @if(!empty($optional_text))
                                        <p>{{ $optional_text }}</p>
                                    @endif
                                    @if(!empty($tag))
                                        <a class="tag" href="/events/{{ $tag }}">{{ $tag }}</a>
                                    @endif
                                </div>
                            </li>
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