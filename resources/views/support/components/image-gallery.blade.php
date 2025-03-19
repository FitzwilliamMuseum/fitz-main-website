@if (!empty($component['image_gallery']))
    @php
        $image_gallery = $component['image_gallery'][0];
    @endphp
    <div class="image-gallery">
        @if (!empty($image_gallery['section_heading']))
            <div class="image-gallery__header">
                <h2>{{ $image_gallery['section_heading'] }}</h2>
            </div>
        @endif
        @php
            $carousel_placement = $loop->index;
            $slides = null;

            if (!empty($image_gallery['gallery_images'])) {
                $slides = $image_gallery['gallery_images'];
            }

            $image_source = null;
            if (!empty($page['image_blocks'])) {
                $image_source = $page['image_blocks'];
            } elseif (!empty($exhibition['exhibition_files'])) {
                $image_source = $exhibition['exhibition_files'];
            }

            function getImageData($image_source, $image_id)
            {
                if (!empty($image_id)) {
                    foreach ($image_source as $image_block) {
                        if (!empty($image_block['directus_files_id'])) {
                            $image_block['asset_id'] = $image_block['directus_files_id'];
                        }
                        if ($image_block['asset_id']['id'] == $image_id) {
                            $image_asset = $image_block['asset_id'];
                        }
                    }
                }
                return $image_asset;
            }
        @endphp
        <div class="image-gallery__wrap">
            <section class="collection-carousel splide p-0">
                <div class="splide__arrows splide__arrows--ltr">
                    <button class="splide__arrow splide__arrow--prev carousel-control-prev" type="button"
                        aria-label="Previous slide" aria-controls="splide01-track">
                        <svg height="48" viewBox="0 0 48 48" width="64" xmlns="http://www.w3.org/2000/svg">
                            <path fill="black" d="M0 0h48v48h-48z"></path>
                            <path fill="white" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
                        </svg>
                    </button>
                    <button class="splide__arrow splide__arrow--next carousel-control-next" type="button"
                        aria-label="Next slide" aria-controls="splide01-track">
                        <svg height="48" viewBox="0 0 48 48" width="64" xmlns="http://www.w3.org/2000/svg">
                            <path fill="black" d="M0 0h48v48h-48z"></path>
                            <path fill="white" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
                        </svg>
                    </button>
                </div>
                <div class="splide__track">
                    <div class="splide__list">
                        @foreach ($image_gallery['gallery_images'] as $image)
                            <li class="splide__slide">
                                @php
                                    $current_image = getImageData($image_source, $image['image_id']);
                                @endphp
                                @if (!empty($image['image_caption']))
                                    <figure>
                                @endif
                                @if (!empty($current_image))
                                    <img src="{{ !empty($current_image['data']['full_url']) }}"
                                        alt="{{ !empty($current_image['data']['description']) ? $block_image['data']['description'] : '' }}"
                                        load="lazy">
                                @endif

                                @if (!empty($image['image_caption']))
                                    <figcaption>{{ $image['image_caption'] }}</figcaption>
                                @endif
                                @if (!empty($image['image_caption']))
                                    </figure>
                                @endif
                            </li>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endif
