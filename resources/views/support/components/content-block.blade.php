@php
    if(!empty($page['content_block_body'])) {
        $content_block_body = $page['content_block_body'];
    }
@endphp
@if(isset($content_block_body))
    <div class="container mx-auto col-max-800 support-content-block-component">
        @markdown($page['content_block_body'])
    </div>
@endif