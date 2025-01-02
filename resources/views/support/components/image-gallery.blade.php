@if(!empty($component['image_gallery']))
    <div class="container image-gallery">
        <div class="row">
            <div id="image-gallery" class="collection-carousel carousel slide" data-ride="carousel" data-bs-interval="false" data-pause="hover">
                <div class="carousel-inner">
                    @foreach(array_chunk($component['image_gallery'],3,true) as $slides)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach($slides as $image)
                                    @php
                                        if(!empty($image['image_id'])) {
                                            if(!empty($page['image_blocks'])) {
                                                $image_source = $page['image_blocks'];
                                            }
                                            if(!empty($exhibition['exhibition_files'])) {
                                                $image_source = $exhibition['exhibition_files'];
                                            }

                                            foreach($image_source as $image_block) {
                                                if(!empty($image_block['directus_files_id'])) {
                                                    $image_block['asset_id'] = $image_block['directus_files_id'];
                                                }
                                                if($image_block['asset_id']['id'] == $image['image_id']) {
                                                    $image_asset = $image_block['asset_id'];
                                            }
                                            }
                                        }
                                    @endphp
                                    <div class="col-md-4 mb-3">
                                        <div class="card gallery-card">
                                            @if(!empty($image_asset))
                                                <img src="{{ $image_asset['data']['full_url'] }}" alt="{{ !empty($image_asset['data']['description']) ? $block_image['data']['description'] : '' }}" load="lazy">
                                            @else
                                                <img
                                                    src="{{ env('MISSING_IMAGE_URL') }}"
                                                    load="lazy" alt="">
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
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