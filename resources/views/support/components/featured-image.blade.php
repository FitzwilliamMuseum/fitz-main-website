@php
    if(!empty($component['image'][0]['image_block_id'])) {
        if(!empty($page['image_blocks'])) {
            foreach($page['image_blocks'] as $image_block) {
                if($image_block['asset_id']['id'] == $component['image'][0]['image_block_id']) {
                    $image_asset = $image_block['asset_id'];
                }
            }
        }
    }
    if(!empty($component['image'][0]['image_caption'])) {
        $caption = $component['image'][0]['image_caption'];
    }
@endphp

@if (isset($image_asset))
    <figure class="container featured_image">
        @if(!empty($image_asset))
            <img src="{{ $image_asset['data']['url'] }}" alt="{{ !empty($image_asset['data']['description']) ? $block_image['data']['description'] : '' }}" load="lazy">
        @else
            <img
                src="{{ env('MISSING_IMAGE_URL') }}"
                load="lazy" alt="">
        @endif
        @if (!empty($caption))
            <figcaption class="col-max-800 mx-auto">{{ !empty($caption) ? $caption : '' }}</figcaption>
        @endif
    </figure>
@endif
