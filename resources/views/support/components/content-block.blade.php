@php
    if(isset($component['content_block'][0]['anchor_heading']) && !empty($component['content_block'][0]['anchor_heading'])) {
        $is_anchor = true;
    }
    if (!empty($component['content_block'][0]['content'])) {
        $content_block_body = $component['content_block'][0]['content'];
    }
    if(!empty($component['content_block'][0]['cta'])) {
        if(!empty($component['content_block'][0]['cta'][0]['link_text'])) {
            $content_block_link_text = $component['content_block'][0]['cta'][0]['link_text'];
        }
        if(!empty($component['content_block'][0]['cta'][0]['link'])) {
            $content_block_link = $component['content_block'][0]['cta'][0]['link'];
        }
    }
@endphp
@if (!empty($content_block_body))
    <div class="container mx-auto col-max-800 support-content-block-component support-cta" 
    @if(isset($is_anchor))
        id="{{Str::slug($component['content_block'][0]['anchor_heading'], '-')}}"
    @endif
    >
        @markdown($content_block_body)
        @if (!empty($content_block_link))
            <a href="{{ $content_block_link }}" class="cta-btn">
                @if (!empty($content_block_link_text))
                    {{ $content_block_link_text }}
                @endif
                @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
            </a>
        @endif
    </div>
@endif
