<div class="exhibition-hero">
    <div class="exhibition-hero-inner">
        <div class="hero-image hero-image--lg">
            {{-- <img src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/pd.80-2022_1_202503_mfj22_mas.jpg" alt=""> --}}
            <img src="https://fitz-cms-images-staging.s3.eu-west-2.amazonaws.com/web-banners-young-people-1.png" alt="">
        </div>
        <div class="hero-text">
            <h1>{{ $exhibition['exhibition_title'] }}</h1>
            <div class="hero__exhibition-date">
                <div class="hero-svg-box">
                    @svg('far-calendar', ['color' => '#000'])
                </div>
                <p>{{ Carbon\Carbon::parse($exhibition['exhibition_start_date'])->format('j F Y') }} – {{ Carbon\Carbon::parse($exhibition['exhibition_end_date'])->format('j F Y') }}</p>
            </div>
            @if(!empty($exhibition['hero_entry_information']))
                <div class="hero__exhibition-price">
                    <p>{{ $exhibition['hero_entry_information'] }}</p>
                </div>
            @endif
            @if($exhibition['type'] == 'exhibition')
                <div class="hero-footer">
                    <div class="hero-buttons">
                        <a class="button--block button--pink" href="/support-us/become-a-friend">
                            Become a Friend
                            @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
                        </a>
                        @if(!empty($exhibition['exhibition_url']))
                            <a href="{{ $exhibition['exhibition_url'] }}" class="button--block button--border">
                                Book tickets
                                @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#000'])
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        <div class="hero-image hero-image--sm">
            @if(!empty($exhibition['hero_image']))
                <img src="{{$exhibition['hero_image']['data']['url']}}" alt="{{ !empty($exhibition['hero_image_alt_text']) ? $exhibition['hero_image_alt_text'] : '' }}">
            @endif
        </div>
    </div>
</div>
