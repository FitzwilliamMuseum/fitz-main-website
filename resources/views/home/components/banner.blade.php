@php
    $banner = $component['banner'][0];
    $banner_image = null;
    $container_class = '';
    $image_source = null;
    $image_asset = null;

    if(isset($banner['full_width']) && $banner['full_width'] == false) {
        $container_class = " container mx-auto";
    }

    if(isset($settings)) {
        $image_source = $settings['component_images'];
    }

    if(isset($banner['image']) && isset($image_source)) {
        // TODO: This should really be moved into it's own function at some stage
        foreach($image_source as $image_block) {
            if(!empty($image_block['directus_files_id'])) {
                $image_block['asset_id'] = $image_block['directus_files_id'];
            }
            if($image_block['asset_id']['id'] == $banner['image']) {
                $image_asset = $image_block['asset_id'];
            }
        }
    }
@endphp
<div class="banner-component--home{{ $container_class }}">
    @if($banner['section_heading'])
      <h2 class="section-heading">{{ $banner['section_heading'] }}</h2>
    @endif
    @include('support.components.banner', [
        'full_width' => $banner['full_width'],
        'banner_heading' => $banner['heading'],
        'banner_subheading' => $banner['subheading'],
        'banner_link_text' => $banner['cta_text'],
        'banner_link' => $banner['cta_link'],
        'banner_image' => $image_asset,
        'banner_image_alt_text' => $banner['image_alt_text']
    ])
</div>