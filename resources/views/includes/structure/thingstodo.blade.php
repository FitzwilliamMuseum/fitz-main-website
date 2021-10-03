<div class="container mt-3">
  <h2 class="lead">Things to do</h2>
  <div class="row">
    @foreach($things['data'] as $thing)
      <x-partner-card
      :altTag="$thing['hero_image_alt_text']"
      :title="$thing['title']"
      :image="$thing['hero_image']"
      :url="$thing['url']"
      />
    @endforeach
  </div>
</div>
