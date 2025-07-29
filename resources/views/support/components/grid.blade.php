{{-- related content --}}

@php
    if (!empty($page['related_page_listing'])) {
        $pages_listing = $page['related_page_listing'];
    }

    $pages_listing_order = isset($pages_listing_order) ? $pages_listing_order : [];

    if (!empty($page['related_pages_order'])) {
        $custom_order = true;
        if (!empty($pages_listing)) {
            foreach ($page['related_pages_order'] as $page_order) {
                foreach ($pages_listing as $page_item) {
                    if ($page_order['page_id'] == $page_item['landing_relevant_page_id']['id']) {
                        $page_item['card_heading'] = $page_order['page_heading'];
                        array_push($pages_listing_order, $page_item);
                    }
                }
            }
        }
    }

    $page_root = Request::url();
@endphp
@if (!empty($component['50_50_content']) && !isset($is_component))
    <div class="container support-grid">
        <div class="row">
            @foreach ($component['50_50_content'] as $card_content)
                @php
                    $image_asset = null;
                    $image_asset_url = env('MISSING_IMAGE_URL');
                    $image_asset_alt = '';
                    $image_asset_width = 416;
                    $image_asset_height = 416;
                    if (!empty($card_content['image_id']) && !empty($page['component_images'])) {
                        foreach ($page['component_images'] as $image_block) {
                            if ($image_block['directus_files_id']['id'] == $card_content['image_id']) {
                                $image_asset = $image_block['directus_files_id'];
                                $image_asset_url = $image_asset['data']['thumbnails'][10]['url'];
                                $image_asset_alt = !empty($image_asset['data']['description'])
                                    ? $image_asset['data']['description']
                                    : '';
                            }
                        }
                    }
                @endphp
                @include('support.components.card', [
                    'image_asset_url' => $image_asset_url,
                    'image_asset_alt' => $image_asset_alt,
                    'image_asset_width' => $image_asset_width,
                    'image_asset_height' => $image_asset_height,
                    'missing_image_url' => env('MISSING_IMAGE_URL'),
                    'heading' => $card_content['heading'] ?? null,
                    'card_link' => $card_content['card_link'] ?? null,
                    'sub_heading' => $card_content['sub_heading'] ?? null,
                    'body' => $card_content['body'] ?? null,
                ])
            @endforeach
        </div>
    </div>
@elseif (!empty($pages_listing_order))
    <div class="container support-grid">
        <div class="row">
            @foreach ($pages_listing_order as $card)
                @php
                    if(isset($card['landing_relevant_page_id'])) {
                        $card = $card['landing_relevant_page_id'];
                    }
                    elseif(isset($card['subpages_id'])) {
                        $card = $card['subpages_id'];
                    }
                    $image_asset_url = '';
                    $image_asset_alt = '';
                    $image_asset_width = 374;
                    $image_asset_height = 342;
                    if (!empty($card['preview_image'])) {
                        $image_asset_url = $card['preview_image']['data']['thumbnails'][13]['url'];
                        $image_asset_alt = isset($card['preview_image']['data']['description'])
                            ? $card['preview_image']['data']['description']
                            : '';
                    } elseif (!empty($card['hero_image'])) {
                        $image_asset_url = $card['hero_image']['data']['thumbnails'][13]['url'];
                        $image_asset_alt = isset($card['hero_image']['data']['description'])
                            ? $card['hero_image']['data']['description']
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
                    'heading' => $card['title'] ?? null,
                    'card_link' => isset($card['slug']) ? $page_root . '/' . $card['slug'] : null,
                    'sub_heading' => null,
                    'body' => null,
                ])
            @endforeach
        </div>
    </div>
@endif
