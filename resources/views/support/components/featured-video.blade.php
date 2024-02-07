@php
    if(!empty($component['video'][0]['video_block_id'])) {
        if(!empty($page['video_blocks'])) {
            foreach($page['video_blocks'] as $video_block) {
                if($video_block['asset_id']['id'] == $component['video'][0]['mp4_id']) {
                    $video_asset_mp4 = $video_block['asset_id'];
                } elseif($video_block['asset_id']['id'] == $component['video'][0]['webm_id']) {
                    $video_asset_webm = $video_block['asset_id'];
                }
            } 
        }
    }
    if(!empty($component['video'][0]['video_caption'])) {
        $caption = $component['video'][0]['video_caption'];
    }
@endphp
<div class="container featured_video mx-auto">
    <video controls width="100%">
        @if(isset($video_asset_webm))
            <source src="{{ $video_asset_webm['data']['url'] }}" type="video/webm">
        @endif
        @if(isset($video_asset_mp4))
            <source src="{{ $video_asset_mp4['data']['url'] }}" type="video/mp4">
        @endif
            Download the
        @if(isset($video_asset_webm))
            <a href="{{ $video_asset_webm['data']['url'] }}">WEBM</a>
        @endif
        @if(isset($video_asset_webm) && isset($video_asset_mp4))
            or
        @endif
        @if(isset($video_asset_mp4))
            <a href="{{ $video_asset_mp4['data']['url'] }}">MP4</a>
        @endif
        video.
    </video>
</div>