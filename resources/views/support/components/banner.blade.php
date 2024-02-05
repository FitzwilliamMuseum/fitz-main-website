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
        if(!empty($page['banner_image'])) {
            $banner_image = $page['banner_image'];
        }
        if(!empty($page['banner_image_alt_text'])) {
            $banner_image_alt_text = $page['banner_image_alt_text'];
        }
    @endphp
    <div class="container container-fluid">
        <div class="component-ff">
            <div class="content">
                <div class="container">
                    @if(isset($banner_heading))
                        <h3>{{ $banner_heading }}</h3>
                    @endif
                    @if(isset($banner_subheading))
                        <p>{{ $banner_subheading }}</p>
                    @endif
                    @if(isset($banner_link))
                        <a href="{{ $banner_link }}" class="nav-link">
                            {{ $banner_link_text }}
                            @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#000'])
                        </a>
                    @endif
                </div>
            </div>
            <div class="image">
                @if(isset($banner_image))
                <img src="{{ $banner_image['data']['url'] }}"
                    alt="{{ $banner_image_alt_text }}">
                @else
                    <img src="https://www.figma.com/file/xj7JfJKleVQrFYzW9Tk6wA/image/543672b12c0d99c9dd327de4acf977f9c89094e6" alt="">
                @endif
            </div>
        </div>
    </div>
