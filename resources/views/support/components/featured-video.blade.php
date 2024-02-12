@php
    if(!empty($component['video'][0]['mp4_id']) || !empty($component['video'][0]['mp4_id'])) {
        if(!empty($page['video_blocks'])) {
            $video_source = $page['video_blocks'];
        }
        if(!empty($exhibition['exhibition_files'])) {
            $video_source = $exhibition['exhibition_files'];
        }
        foreach($video_source as $video_block) {
            if($video_block['directus_files_id']) {
                $video_block['asset_id'] = $video_block['directus_files_id'];
            }
            if(!empty($component['video']['0']['mp4_id']) && $video_block['asset_id']['id'] == $component['video'][0]['mp4_id']) {
                $video_asset_mp4 = $video_block['asset_id'];
            } elseif(!empty($component['video']['0']['webm_id']) && $video_block['asset_id']['id'] == $component['video'][0]['webm_id']) {
                $video_asset_webm = $video_block['asset_id'];
            }
        }
        if(!empty($component['video'][0]['video_caption'])) {
            $caption = $component['video'][0]['video_caption'];
        }
    }
@endphp
{{-- {{ dd($exhibition['exhibition_files']) }} --}}
<div class="container featured_video mx-auto">
    <video controls width="100%">
        @if(!empty($video_asset_webm))
            <source src="{{ $video_asset_webm['data']['url'] }}" type="video/webm">
        @endif
        @if(!empty($video_asset_mp4))
            <source src="{{ $video_asset_mp4['data']['url'] }}" type="video/mp4">
        @endif
            Download the
        @if(!empty($video_asset_webm))
            <a href="{{ $video_asset_webm['data']['url'] }}">WEBM</a>
        @endif
        @if(!empty($video_asset_webm) && !empty($video_asset_mp4))
            or
        @endif
        @if(!empty($video_asset_mp4))
            <a href="{{ $video_asset_mp4['data']['url'] }}">MP4</a>
        @endif
        video.
    </video>
</div>