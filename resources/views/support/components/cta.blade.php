@php
if (!empty($page['cta_block_heading'])) {
    $cta_block_heading = $page['cta_block_heading'];
    $cta_block_body = $page['cta_block_body'];
}
if (!empty($page['cta_block_link'])) {
    $cta_block_link = $page['cta_block_link'];
    $cta_block_link_text = $page['cta_block_link_text'];
}
@endphp
{{-- text-component cta --}}
    <div class="container col-max-800 mx-auto support-text-component support-cta">
        @if (isset($cta_block_heading))
            <h2 class="cta-title">{{ $cta_block_heading }}</h2>
        @endif
        @if (isset($cta_block_body))
            <p class="cta-copy">{{ $cta_block_body }}</p>
        @endif
        @if (isset($cta_block_link))
            <a href="{{ $cta_block_link }}" class="cta-btn">
                {{ $cta_block_link_text }}
                @svg('fas-chevron-right', ['width' => '16px', 'height' => '16px', 'color' => '#fff'])
            </a>
        @endif
    </div>
