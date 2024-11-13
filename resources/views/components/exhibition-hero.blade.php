@php
    /*
        Carbon::createFromFormat('Y-m-d', $hero["end"])->endOfDay()->isPast()
        Is checking if the end date of an exhibition is in the past.
        If the end date is today, it will return false until the end of the day (23:59:59).
    */
    $exhibitionStatus = (!empty($hero["end"]) && \Carbon\Carbon::createFromFormat('Y-m-d', $hero["end"])->endOfDay()->isPast());
    $riseUp = $_SERVER['REQUEST_URI'] === '/plan-your-visit/exhibitions/rise-up' ? 'rise-up' : '';
@endphp
@if (!empty($hero))
    <div class="parallax home-hero exhibition-hero">
        @if(!empty($hero['image']))
            {{-- <div class="bg-overlay" style="background: linear-gradient( to top, rgba(0, 0, 0, 0.8) 10%, transparent ), url({{ $hero['image']['data']['url'] }}) no-repeat center center / cover"></div> --}}
            <div class="bg-overlay" style="background: linear-gradient( to top, rgba(0, 0, 0, 0.8) 10%, transparent ), url('https://fitz-cms-images.s3.eu-west-2.amazonaws.com/experiment-joy-labinjo-1.jpg') no-repeat center center / cover"></div>
        @else
            <div class="bg-overlay"></div>
        @endif
        <div class="addon {{ $riseUp }}">
            <div class="wrapper {{ $riseUp }}">
                @if (!empty($hero['hero_title']))
                    <h1>{{ $hero['hero_title'] }}</h1>
                @else
                    <h1>{{ $exhibition_title }}</h1>
                @endif
                @if (!empty($hero['hero_subtitle']))
                    <p>
                        {{ !empty($exhibitionStatus) ? 'Now closed' : $hero['hero_subtitle'] }}
                    </p>
                @endif
                @if($hero['start'])
                    <p style="{{ !empty($exhibitionStatus) ? "display: none;": '' }}">
                        {{  Carbon\Carbon::parse($hero['start'])->format('j F Y') }}
                        -
                        {{  Carbon\Carbon::parse($hero['end'])->format('j F Y') }}
                    </p>
                @endif
            </div>
        </div>
    </div>
@endif
