@if (!empty($hero))
<div class="head parallax home-hero">
    <div class="bg-overlay"></div>
    <div class="addon">
        <div class="wrapper">
            @if (!empty($hero['hero_title']))
                <h1>{{ $hero['hero_title'] }}</h1>
            @else
                <h1>{{ $title }}</h1>
            @endif
            @if (!empty($hero['hero_subtitle']))
                <p>
                    {{ $hero['hero_subtitle'] }}
                </p>
            @endif
            @if ($hero['exhibition_link'] && $hero['exhibition_link']['exhibition_start_date'])
                <p>
                    {{ Carbon\Carbon::parse($hero['exhibition_link']['exhibition_start_date'])->format('j F Y') }}
                    -
                    {{ Carbon\Carbon::parse($hero['exhibition_link']['exhibition_end_date'])->format('j F Y') }}
                </p>
            @endif
        </div>
        @if (!empty($hero['ticket_link']))
            <a class="hero-cta" href="{{ $hero['ticket_link'] }}">
                {{ $hero['exhibition_link_text'] }}
                @svg('fas-chevron-right', ['width' => '16', 'height' => '16', 'color' => '#000'])
            </a>
        @else
            @if (!empty($hero['exhibition_link']))
                <a class="hero-cta" href="{{ route('exhibition', $hero['exhibition_link']['slug']) }}">
                    {{ $hero['exhibition_link_text'] }}
                    @svg('fas-chevron-right', ['width' => '16', 'height' => '16', 'color' => '#000'])
                </a>
            @endif
        @endif
    </div>
</div>
@endif
