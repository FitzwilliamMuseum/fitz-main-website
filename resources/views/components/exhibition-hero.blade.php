@if (!empty($hero))
    <div class="parallax home-hero exhibition-hero">
        <div class="bg-overlay"></div>
        <div class="addon">
            <div class="wrapper">
                @if (!empty($hero['hero_title']))
                    <h1>{{ $hero['hero_title'] }}</h1>
                @else
                    {{--                    <h1>{{ title }}</h1>--}}
                @endif
                @if (!empty($hero['hero_title']))
                    <p>
                        {{ $hero['hero_subtitle'] }}
                    </p>
                @endif
                <p>
                    {{  Carbon\Carbon::parse($hero['start'])->format('l jS F Y') }}
                    -
                    {{  Carbon\Carbon::parse($hero['end'])->format('l jS F Y') }}
                </p>
            </div>
        </div>
    </div>
@endif
