    {{-- 50/50 --}}
    @php
        $banner_heading = $page['banner_heading'];
        $banner_subheading = $page['banner_subheading'];
        $banner_link_text = $page['banner_cta_text'];
        $banner_link = $page['banner_cta_link'];
        $banner_image = $page['banner_image'];
        $banner_image_alt_text = $page['banner_image_alt_text'];
    @endphp
    <div class="container container-fluid">
        <div class="component-ff">
            <div class="content">
                <div class="container">
                    <h3>{{ $banner_heading }}</h3>
                    <p>{{ $banner_subheading }}</p>
                    <a href="{{ $banner_link }}" class="nav-link">
                        {{ $banner_link_text }}
                        @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#000'])
                    </a>
                </div>
            </div>
            <div class="image">
                {{-- {{ dd($banner_image) }} --}}
                <img src="{{ $banner_image['data']['url'] }}"
                    alt="{{ $banner_image_alt_text }}">
            </div>
        </div>
    </div>
