{{-- Banner --}}

@php
    if (!empty($page['banner_heading'])) {
        $banner_heading = $page['banner_heading'];
    }
    if (!empty($page['banner_subheading'])) {
        $banner_subheading = $page['banner_subheading'];
    }

    if (!empty($page['banner_cta_text'])) {
        $banner_link_text = $page['banner_cta_text'];
    }
    if (!empty($page['banner_cta_link'])) {
        $banner_link = $page['banner_cta_link'];
    }

    if (!empty($page['banner_image'])) {
        $banner_image = $page['banner_image'];
    }

    if (!empty($page['banner_image_alt_text'])) {
        $banner_image_alt_text = $page['banner_image_alt_text'];
    }
@endphp
@if (!empty($banner_heading) || !empty($banner_subheading))
    <div>
        <div class="container mx-auto component-ff">
            <div class="content">
                <div class="container">
                    @if (!empty($banner_heading))
                        <h2>{{ $banner_heading }}</h2>
                    @endif
                    @if (!empty($banner_subheading))
                        <p>{{ $banner_subheading }}</p>
                    @endif
                    @if (!empty($banner_link))
                        <a href="{{ $banner_link }}" class="nav-link">
                            @if (!empty($banner_link_text))
                                {{ $banner_link_text }}
                            @endif
                            @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#000'])
                        </a>
                    @endif
                </div>
            </div>
            <div class="image">
                @if (!empty($banner_image))
                    <img src="{{ $banner_image['data']['url'] }}"
                    alt=""> @else <img
                        src="{{ env('MISSING_IMAGE_URL') }}" alt="">
                @endif
            </div>
        </div>
    </div>
@endif
