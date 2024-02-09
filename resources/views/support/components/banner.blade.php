    {{-- Banner --}}

    @php
        if(!empty($page['banner_heading'])) {
            $banner_heading = $page['banner_heading'];
        }
        if(!empty($page['banner_subheading'])) {
            $banner_subheading = $page['banner_subheading'];
        }

        if(!empty($page['banner_cta_text'])) {
            $banner_link_text = $page['banner_cta_text'];
        }
        if(!empty($page['banner_cta_link'])) {
            $banner_link = $page['banner_cta_link'];
        }
    @endphp
    <div class="container container-fluid">
        <div class="component-ff">
            <div class="content">
                <div class="container">
                    @if(!empty($banner_heading))
                        <h3>{{ $banner_heading }}</h3>
                    @endif
                    @if(!empty($banner_subheading))
                        <p>{{ $banner_subheading }}</p>
                    @endif
                    @if(!empty($banner_link))
                        <a href="{{ $banner_link }}" class="nav-link">
                            @if(!empty($banner_link_text))
                                {{ $banner_link_text }}
                            @endif
                            @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#000'])
                        </a>
                    @endif
                </div>
            </div>
            <div class="image">
                @if(!empty($banner_image))
                <img src="{{ $banner_image['data']['url'] }}"
                    @if(!empty($banner_image_alt_text))
                        alt="{{ $banner_image_alt_text }}">
                    @endif
                @else
                    <img src="https://www.figma.com/file/xj7JfJKleVQrFYzW9Tk6wA/image/543672b12c0d99c9dd327de4acf977f9c89094e6" alt="">
                @endif
            </div>
        </div>
    </div>