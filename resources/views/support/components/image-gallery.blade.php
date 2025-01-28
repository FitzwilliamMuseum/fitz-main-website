@if(!empty($component['image_gallery']))
    @php
        $image_gallery = $component['image_gallery'][0];
    @endphp
    <div class="image-gallery">
        @if(!empty($image_gallery['section_heading']))
            <div class="row image-gallery__header">
                <h2>{{ $image_gallery['section_heading'] }}</h2>
            </div>
        @endif
        <div class="row">
            <div id="image-gallery" class="collection-carousel carousel" data-interval="false" data-wrap="false" data-pause="false">
                <div class="carousel-inner">
                    @php
                        $carousel_placement = $loop->index;
                        $slides = null;

                        if(!empty($image_gallery['gallery_images'])) {
                            $slides = $image_gallery['gallery_images'];
                        }

                        $image_source = null;
                        if(!empty($page['image_blocks'])) {
                            $image_source = $page['image_blocks'];
                        } elseif(!empty($exhibition['exhibition_files'])) {
                            $image_source = $exhibition['exhibition_files'];
                        }

                        function getImageData($image_source, $image_id) {
                            if(!empty($image_id)) {
                                foreach($image_source as $image_block) {
                                    if(!empty($image_block['directus_files_id'])) {
                                        $image_block['asset_id'] = $image_block['directus_files_id'];
                                    }
                                    if($image_block['asset_id']['id'] == $image_id) {
                                        $image_asset = $image_block['asset_id'];
                                    }
                                }
                            }
                            return $image_asset;
                        }
                    @endphp
                    @if($slides != null)
                        @foreach($slides as $slide)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <div class="row">
                                    <div class="carousel-track w-100">
                                        <div class="card gallery-card">
                                            @php
                                                $index = $loop->index;
                                                $prev_index = $index - 1;
                                                $prev_image = null;
                                                $next_index = $index + 1;
                                                $next_image = null;

                                                if($prev_index >= 0) {
                                                    $prev_image = getImageData($image_source, $slides[$prev_index]['image_id']);
                                                }
                                                
                                                $current_image = getImageData($image_source, $slide['image_id']);
                                                
                                                if(!empty($slides[$next_index])) {
                                                    $next_image = getImageData($image_source, $slides[$next_index]['image_id']);
                                                }
                                            @endphp
                                            
                                            @if(!empty($prev_image))
                                                <div class="gallery-card__image gallery-card__image--inactive">
                                                    <img src="{{ $prev_image['data']['full_url'] }}" alt="{{ !empty($prev_image['data']['description']) ? $block_image['data']['description'] : '' }}" load="lazy">
                                                </div>
                                            @endif

                                            <div class="gallery-card__image">
                                                @if(!empty($slide['image_caption'])) <figure> @endif

                                                <img src="{{ $current_image['data']['full_url'] }}" alt="{{ !empty($current_image['data']['description']) ? $block_image['data']['description'] : '' }}" load="lazy">

                                                @if(!empty($slide['image_caption'])) 
                                                    <figcaption>{{ $slide['image_caption'] }}</figcaption>
                                                @endif
                                                @if(!empty($slide['image_caption'])) </figure> @endif
                                            </div>
                                            @if(!empty($next_image))
                                                <div class="gallery-card__image gallery-card__image--inactive">
                                                    <img src="{{ $next_image['data']['full_url'] }}" alt="{{ !empty($next_image['data']['description']) ? $block_image['data']['description'] : '' }}" load="lazy">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#image-gallery" data-bs-slide="prev">
                    <svg height="48" viewBox="0 0 48 48" width="64" xmlns="http://www.w3.org/2000/svg">
                        <path fill="black" d="M0 0h48v48h-48z"></path>
                        <path fill="white" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
                    </svg>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#image-gallery" data-bs-slide="next">
                    <svg height="48" viewBox="0 0 48 48" width="64" xmlns="http://www.w3.org/2000/svg">
                        <path fill="black" d="M0 0h48v48h-48z"></path>
                        <path fill="white" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
                    </svg>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
@endif