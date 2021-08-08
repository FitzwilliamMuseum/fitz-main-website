<div class="container mt-3">
  <h2 class="display-5">Things to do</h2>
  <div class="row">
    @foreach($things['data'] as $thing)
    <div class="col-md-4 mb-3">
      <div class="card  h-100">
        <a href="{{ $thing['url'] }}"><img class="img-fluid" src="{{ $thing['hero_image']['data']['thumbnails'][2]['url'] }}"
        alt="{{ $thing['hero_image_alt_text']}}" loading="lazy"
        width="{{ $thing['hero_image']['data']['thumbnails'][4]['width'] }}"
        height="{{ $thing['hero_image']['data']['thumbnails'][4]['height'] }}"
        /></a>
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="{{ $thing['url'] }}">{{ $thing['title'] }}</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
