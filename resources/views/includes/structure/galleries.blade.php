<div class="container mt-3 container-home-cards">
    <h3>
        <a href="{{ route('galleries') }}">Discover our galleries</a>
    </h3>
    <div class="row row-home">
        @foreach($galleries['data'] as $gallery)
            <x-image-card
                :image="$gallery['hero_image']"
                :altTag="$gallery['hero_image_alt_text']"
                :params="[$gallery['slug']]"
                :route="'gallery'"
                :title="$gallery['gallery_name']"
            />
        @endforeach
    </div>
</div>
