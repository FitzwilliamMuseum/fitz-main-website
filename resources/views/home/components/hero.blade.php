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
                @svg('fas-calendar-days', ['width' => '24px', 'height' => '24px', 'color' => '#fff'])
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
