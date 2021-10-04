<div class="container mt-3">
  <h2 class="lead">
    Discover our galleries
  </h2>
  <div class="row">
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
