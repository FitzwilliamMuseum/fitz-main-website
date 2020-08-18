@foreach($areas['data'] as $area)
@if(!empty($area['associated_research']))
@section('research-projects')
<div class="container">
  <h3>Associated Research Projects</h3>
  <div class="row">
    @foreach($area['associated_research'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card  h-100 ">
        @if(!is_null($project['research_projects_id']['hero_image']))
        <div class="embed-responsive embed-responsive-4by3">
          <a href="/research/projects/{{ $project['research_projects_id']['slug']}}"><img class="img-fluid embed-responsive-item" src="{{ $project['research_projects_id']['hero_image']['data']['thumbnails'][4]['url']}}"
          width="{{ $project['research_projects_id']['hero_image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $project['research_projects_id']['hero_image']['data']['thumbnails'][4]['height'] }}"
          alt="{{ $project['research_projects_id']['hero_image_alt_text'] }}"
          loading="lazy"/></a>
        </div>
        @endif
        <div class="card-body">
          <div class="contents-label mb-3">
            <h3>
              <a href="/research/projects/{{ $project['research_projects_id']['slug']}}">{{ $project['research_projects_id']['title']}}</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
@endif
@endforeach
