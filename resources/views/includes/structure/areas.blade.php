<div class="container">
    <h2>Areas of expertise</h2>
    <div class="row">
        @foreach($areas['data'] as $area)
            <x-image-card
                :image="$area['hero_image']"
                :altTag="$area['hero_image_alt_text']"
                :route="'conservation-care'"
                :params="[$area['slug']]"
                :title="$area['title']"
            />
        @endforeach
    </div>
</div>
