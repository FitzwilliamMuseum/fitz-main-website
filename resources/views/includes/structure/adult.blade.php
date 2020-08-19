<h3>Creative inspiration, wellbeing and ideas for you at home</h3>
<div class="row">
  @foreach($sessions['data'] as $session)
  <div class="col-md-4 mb-3">
    <div class="card  h-100">
      @if(!is_null($session['hero_image']))
        <a href="{{ route('school-sessions', $session['slug']) }}"><img class="img-fluid" src="{{ $session['hero_image']['data']['thumbnails'][4]['url']}}"
        alt="{{ $session['hero_image_alt_text'] }}"
        width="{{ $session['hero_image']['data']['thumbnails'][4]['height'] }}"
        height="{{ $session['hero_image']['data']['thumbnails'][4]['width'] }}"
        loading="lazy" /></a>
      @else
        <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
        alt="No image was provided for {{ $session['title'] }}"/>
      @endif
      <div class="card-body h-100">
        <div class="contents-label mb-3">
          <h3>
            <a href="{{ route('adult-activity', $session['slug']) }}">{{ $session['title'] }}</a>
          </h3>
        </div>
      </div>
    </div>
  </div>

  @endforeach
</div>
