@php

    if(isset($component['soundcloud_embed'][0]['anchor_heading']) && !empty($component['soundcloud_embed'][0]['anchor_heading'])) {
        $is_anchor = true;
    }

    $embed_code = $component['soundcloud_embed'][0]['embed_code'];
@endphp
@if(!empty($embed_code))
    <div class="component soundcloud-embed-component"
    @if(isset($is_anchor))
        id="{{Str::slug($component['soundcloud_embed'][0]['anchor_heading'], '-')}}"
    @endif
    >
        <div class="container mx-auto col-max-800">

            @if(!empty($component['soundcloud_embed'][0]['soundcloud_heading']))
                <h2 class="soundcloud-title">{{ $component['soundcloud_embed'][0]['soundcloud_heading'] }}</h2>
            @endif

            {!! SiteHelper::hideEmbed($embed_code) !!}
        </div>
    </div>
@endif
