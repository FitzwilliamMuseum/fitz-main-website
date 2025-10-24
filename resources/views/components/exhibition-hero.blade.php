@php
    /*
        Carbon::createFromFormat('Y-m-d', $hero["end"])->endOfDay()->isPast()
        Is checking if the end date of an exhibition is in the past.
        If the end date is today, it will return false until the end of the day (23:59:59).
    */
    $exhibitionStatus = (!empty($hero["end"]) && \Carbon\Carbon::createFromFormat('Y-m-d', $hero["end"])->endOfDay()->isPast());

    $heroClasses = '';

    if('rise-up' === $hero['exhibition_slug']) {
        $heroClasses = 'exhibition-hero--variable-height';
    }
@endphp
@if (!empty($hero))
    <div class="parallax home-hero exhibition-hero {{ $heroClasses }}">
        @if(!empty($hero['image']))
            {{-- @TODO: We should refactor this so that it uses an img element for both of these instances - background image isn't ideal here --}}
            @if(str_contains($heroClasses, 'exhibition-hero--variable-height'))
                <div class="bg-overlay" style="background: linear-gradient( to top, rgba(0, 0, 0, 0.8) 10%, transparent ), url({{ $hero['image']['data']['url'] }}) no-repeat center center / cover">
                    <img src="{{ $hero['image']['data']['url'] }}" alt="">
                </div>
            @else
                <div class="bg-overlay" style="background: linear-gradient( to top, rgba(0, 0, 0, 0.8) 10%, transparent ), url({{ $hero['image']['data']['url'] }}) no-repeat center center / cover"></div>
            @endif
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
                        {{ !empty($exhibitionStatus) ? 'Now closed' : $hero['hero_subtitle'] }}
                    </p>
                @endif
                @if($hero['start'])
                <p>
                    {{  Carbon\Carbon::parse($hero['start'])->format('j F Y') }}
                    @if($hero['display_end_date'])
                        -
                        {{  Carbon\Carbon::parse($hero['end'])->format('j F Y') }}
                    @endif
                </p>
            @endif
            </div>
        </div>
    </div>
@endif
