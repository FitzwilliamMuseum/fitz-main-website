<div class="container">
  <h3 class="lead">Areas of expertise</h3>
  <div class="row">
    @foreach($areas['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card  h-100">
        @if(!is_null($project['hero_image']))
          <a href="/about-us/departments/conservation-and-collections-care/{{$project['slug']}}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
          alt="A highlight image for {{ $project['hero_image_alt_text'] }}"
          height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}"
          width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
          loading="lazy"/></a>
        @endif
        <div class="card-body h-100">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="/about-us/departments/conservation-and-collections-care/{{$project['slug']}}">{{ $project['title']}}</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
