@php
    $custom_listing = $settings['custom_page_listing'];
    $image_source = isset($settings['component_images']) ? $settings['component_images'] : null;
@endphp


    <div class="container support-grid">
        <div class="row">
            @foreach ($custom_listing as $card)
                @php
                    if(!empty($image_source)) {
                        foreach($image_source as $image_block) {
                            // Add a contingency for the different handles for this field on different page templates that use this component
                            $image_block_id = '';
                            
                            if(isset($image_block['directus_files_id'])) {
                                $image_block_id = $image_block['directus_files_id'];
                            }

                            if($image_block_id['id'] == $card['image_id']) {
                                $image_asset = $image_block_id;
                            }
                        }
                    }
                    $image_asset_url = '';
                    $image_asset_alt = '';
                    $image_asset_width = 374;
                    $image_asset_height = 342;
                    if (isset($image_asset)) {
                        $image_asset_url = $image_asset['data']['thumbnails'][13]['url'];
                        $image_asset_alt = isset($image_asset['data']['description'])
                            ? $image_asset['data']['description']
                            : '';
                    } else {
                        $image_asset_url =
                            'https://fitz-content.studio24.dev/fitz-website/assets/Families 2.jpg?key=exhibition';
                    }
                @endphp
                @include('support.components.card', [
                    'image_asset_url' => $image_asset_url,
                    'image_asset_alt' => $image_asset_alt,
                    'image_asset_width' => $image_asset_width,
                    'image_asset_height' => $image_asset_height,
                    'missing_image_url' =>
                        'https://fitz-content.studio24.dev/fitz-website/assets/Families 2.jpg?key=exhibition',
                    'heading' => $card['heading'] ?? null,
                    'card_link' => isset($card['page_link']) ? $card['page_link'] : null,
                    'sub_heading' => null,
                    'body' => null,
                ])
            @endforeach
        </div>
    </div>