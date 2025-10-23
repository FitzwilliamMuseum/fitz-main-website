@php
    $embed_code = $component['soundcloud_embed'][0]['embed_code'];
@endphp
@if(!empty($embed_code))
    <div class="component soundcloud-embed-component">
        <div class="container mx-auto col-max-800">
            {!! $embed_code !!}
        </div>
    </div>
@endif