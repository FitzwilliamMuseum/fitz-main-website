<div class="container mt-3">
  <h3>
    <a href="{{route('podcasts')}}">Podcasts</a>
  </h3>
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
