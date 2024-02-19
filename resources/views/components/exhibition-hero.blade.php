@if (!empty($hero))
    <div class="parallax home-hero exhibition-hero">
        @if(!empty($hero['image']))
            <div class="bg-overlay" style="background: linear-gradient( to top, rgba(0, 0, 0, 0.8) 10%, transparent ), url({{ $hero['image']['data']['url'] }})"></div>
        @else
            <div class="bg-overlay"></div>
        @endif
        <div class="addon">
            <div class="wrapper">
                @if (!empty($hero['hero_title']))
                    <h1>{{ $hero['hero_title'] }}</h1>
                @else
                    <h1>{{ $exhibition_title }}</h1>
                @endif
                @if (!empty($hero['hero_subtitle']))
                    <p>
                        {{ $hero['hero_subtitle'] }}
                    </p>
                @endif
                @if($hero['start'])
                    <p>
                        {{  Carbon\Carbon::parse($hero['start'])->format('l jS F Y') }}
                        -
                        {{  Carbon\Carbon::parse($hero['end'])->format('l jS F Y') }}
                    </p>
                @endif
            </div>
        </div>
    </div>
@endif
