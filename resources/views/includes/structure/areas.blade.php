<div class="container">
  <h3 class="lead">Areas of expertise</h3>
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
