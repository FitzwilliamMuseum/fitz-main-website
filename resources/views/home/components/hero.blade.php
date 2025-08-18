@php
    if(!empty($settings['exhibition_link'])) {
        $featured_exhibition = $settings['exhibition_link'];
    }

    if(!empty($settings['hero_image'])) {
        $heroImage = $settings['hero_image']['data']['thumbnails'][10]['url'];
    }
    @endphp
<div class="head">
    <div class="homepage-hero--new">
        <div class="hero-image">
            <img src="{{ $heroImage }}" alt="">
        </div>
        <div class="hero-body">
            @if(!empty($settings['hero_title']))
                <h1>{{ $settings['hero_title'] }}</h1>
            @elseif(isset($featured_exhibition)) {
                <h1>{{ $featured_exhibition['exhibition_title'] }}</h1>
            }
            @else
                <h1>{{ $settings['title'] }}</h1>
            @endif
            @if(!empty($settings['hero_subtitle']))
                <p class="subheading">{{ $settings['hero_subtitle'] }}</p>
            @endif
            <div class="hero-body__exhibition-date">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="34" height="34" fill="none"><g clip-path="url(#a)"><g clip-path="url(#b)"><path fill="#fff" d="M10.5 16.834H8.167v2.333H10.5v-2.334Zm4.667 0h-2.334v2.333h2.334v-2.334Zm4.666 0H17.5v2.333h2.333v-2.334Zm2.334-8.167H21V6.334h-2.333v2.333H9.333V6.334H7v2.333H5.833A2.323 2.323 0 0 0 3.512 11L3.5 27.334a2.333 2.333 0 0 0 2.333 2.333h16.334a2.34 2.34 0 0 0 2.333-2.334V11a2.34 2.34 0 0 0-2.333-2.333Zm0 18.667H5.833V14.5h16.334v12.834Z"/></g></g><defs><clipPath id="a"><path fill="#fff" d="M0 4h28v28H0z"/></clipPath><clipPath id="b"><path fill="#fff" d="M0 4h28v28H0z"/></clipPath></defs></svg>
                @if ($featured_exhibition && $featured_exhibition['exhibition_start_date'])
                    <p>
                        {{ Carbon\Carbon::parse($featured_exhibition['exhibition_start_date'])->format('j F Y') }}
                        @if($featured_exhibition['display_end_date'])
                            -
                            {{ Carbon\Carbon::parse($featured_exhibition['exhibition_end_date'])->format('j F Y') }}
                        @endif
                    </p>
                @endif
            </div>
            <div class="hero-body__footer">
                @if (!empty($hero['ticket_link']))
                    <a class="button" href="{{ $hero['ticket_link'] }}">
                        {{ $hero['exhibition_link_text'] }}
                        @svg('fas-chevron-right', ['width' => '16', 'height' => '16', 'color' => '#000'])
                    </a>
                @else
                    @if (!empty($hero['exhibition_link']))
                        <a class="button" href="{{ route('exhibition', $hero['exhibition_link']['slug']) }}">
                            {{ $hero['exhibition_link_text'] }}
                            @svg('fas-chevron-right', ['width' => '16', 'height' => '16', 'color' => '#000'])
                        </a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
