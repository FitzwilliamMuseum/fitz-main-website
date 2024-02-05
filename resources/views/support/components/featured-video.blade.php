@php
  if(!empty($page['block_video'])) {
    $block_video = $page['block_video'];
  }
  if(!empty($page['block_video_caption'])) {
    $block_video_caption = $page['block_video_caption'];
  }
@endphp
<div class="container featured_video mx-auto">
    @if(isset($block_video))
      <video controls width="100%">
          <source src="{{ $block_video['data']['url'] }}" type="video/webm" />

          <source src="{{ $block_video['data']['url'] }}" type="video/mp4" />

          Download the
          <a href="{{ $block_video['data']['url'] }}">WEBM</a>
          or
          <a href="{{ $block_video['data']['url'] }}">MP4</a>
          video.
          @if(isset($block_video_caption))
            <p>{{ $block_video_caption }}</p>
          @endif
        </video>
        @else
          <video controls width="100%">
              <source src="/media/cc0-videos/flower.webm" type="video/webm" />

              <source src="/media/cc0-videos/flower.mp4" type="video/mp4" />

              Download the
              <a href="/media/cc0-videos/flower.webm">WEBM</a>
              or
              <a href="/media/cc0-videos/flower.mp4">MP4</a>
              video.
          </video>
      @endif
</div>
