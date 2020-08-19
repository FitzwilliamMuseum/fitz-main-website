<div class="container">
  <h3>Our research projects</h3>
  <div class="row">
      @foreach($research['data'] as $project)
      <div class="col-md-4 mb-3">
        <div class="card h-100 ">
          @if(!is_null($project['hero_image']))
          <a href="{{ route('research-project', $project['slug']) }}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
          alt="{{ $project['hero_image_alt_text']}}" loading="lazy"
          width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"/></a>
          @endif
          <div class="card-body h-100">
            <div class="contents-label mb-3">
              <h3>
                <a href="{{ route('research-project', $project['slug']) }}">{{ $project['title']}}</a>
              </h3>
            </div>
            </div>
          </div>
        </div>
      @endforeach
  </div>
</div>
