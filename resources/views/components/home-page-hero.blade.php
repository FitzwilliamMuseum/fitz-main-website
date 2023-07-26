@if (!empty($hero))
    <div class="head parallax home-hero">
        <div class="bg-overlay"></div>
        <div class="addon">
            <div class="wrapper">
                @if (!empty($hero['hero_title']))
                    <h1>{{ $hero['hero_title'] }}</h1>
                @else
                    <h1>{{ title }}</h1>
                @endif
                @if (!empty($hero['hero_title']))
                    <p>
                        {{ $hero['hero_subtitle'] }}
                    </p>
                @endif
                @if ($hero['exhibition_link'])
                    <p>
                        <time
                            datetime="{{ $hero['exhibition_link']['exhibition_start_date'] }}">{{ date('l jS F o', strtotime($hero['exhibition_link']['exhibition_start_date'])) }}</time>
                        -
                        <time
                            datetime="{{ $hero['exhibition_link']['exhibition_end_date'] }}">{{ date('l jS F o', strtotime($hero['exhibition_link']['exhibition_end_date'])) }}</time>
                    </p>
                @endif
            </div>
            @if (!empty($hero['exhibition_link']))
                <button class="hero-cta">
                    <a
                        href="{{ route('exhibition', $hero['exhibition_link']['slug']) }}">{{ $hero['exhibition_link_text'] }}</a>
                </button>
            @endif
        </div>

        {{-- <div class="home-hero-image"> --}}
            {{-- @if (!empty($hero['hero_image'])) --}}
            {{-- <picture> --}}
                {{-- @foreach ($hero['hero_image']['data']['thumbnails'] as $image) --}}
                    <?php
                    // preg_match('/\?key=(.*)$/', $image['url'], $m);
                    // $key = $m[1] ?? null;
                    ?>
                    {{-- @if (!empty($key) && $key == 'mural-tablet') --}}
                        {{-- <source
                            media="(max-width: 768px)"
                            srcset="{{ $image['url'] }}"
                            width="{{ $image['width'] }}"
                            height="{{ $image['height'] }}"
                            /> --}}
                    {{-- @elseif (!empty($key) && $key == 'mural-phone') --}}
                        {{-- <source
                            media="(max-width: 574px)"
                            srcset="{{ $image['url'] }}"
                            width="{{ $image['width'] }}"
                            height="{{ $image['height'] }}"
                            /> --}}
                    {{-- @endif --}}
                {{-- @endforeach --}}
                    {{-- <img src="{{ $hero['hero_image']['data']['full_url'] }}" alt="{{ $hero['hero_image_alt_text'] }}" /> --}}
            {{-- </picture> --}}
        {{-- @endif --}}
        {{-- </div> --}}

    </div>
@endif
