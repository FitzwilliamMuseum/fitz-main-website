<div class="exhibition-hero">
    <div class="exhibition-hero-inner">
        <div class="hero-image hero-image--lg">
            <img src="{{ $exhibition['hero_image']['data']['thumbnails'][13]['url'] }}" alt="" width="{{ $exhibition['hero_image']['data']['thumbnails'][13]['width'] }}" height="{{ $exhibition['hero_image']['data']['thumbnails'][13]['height'] }}">
        </div>
        <div class="hero-text">
            <h1>{{ $exhibition['exhibition_title'] }}</h1>
            <div class="hero__exhibition-date">
                <div class="hero-svg-box">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="34" height="34" fill="none"><g clip-path="url(#a)"><g clip-path="url(#b)"><path fill="#000" d="M10.5 16.834H8.167v2.333H10.5v-2.334Zm4.667 0h-2.334v2.333h2.334v-2.334Zm4.666 0H17.5v2.333h2.333v-2.334Zm2.334-8.167H21V6.334h-2.333v2.333H9.333V6.334H7v2.333H5.833A2.323 2.323 0 0 0 3.512 11L3.5 27.334a2.333 2.333 0 0 0 2.333 2.333h16.334a2.34 2.34 0 0 0 2.333-2.334V11a2.34 2.34 0 0 0-2.333-2.333Zm0 18.667H5.833V14.5h16.334v12.834Z"/></g></g><defs><clipPath id="a"><path fill="#fff" d="M0 4h28v28H0z"/></clipPath><clipPath id="b"><path fill="#fff" d="M0 4h28v28H0z"/></clipPath></defs></svg>
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
