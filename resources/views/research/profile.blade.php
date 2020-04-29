@extends('layouts.layout')
@foreach($profiles['data'] as $profile)
@section('keywords', $profile['meta_keywords'])
@section('description', $profile['meta_description'])
@section('title', $profile['display_name'])
@if(!is_null($profile['hero_image']))
@section('hero_image', $profile['hero_image']['data']['full_url'])
@section('hero_image_title', $profile['hero_image_alt_text'])
@endif
  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
      <img class="align-self-center mr-3 rounded-circle float-right
      thumb-post" src="{{ $profile['profile_image']['data']['full_url']}}" alt="Meet the Creative Economy Engagement team's profile image" height="150" width="150">
      {!! $profile['biography'] !!}
      @if(isset($profile['college_affiliated']))
      <h4>Affiliated college</h4>
      <ul>
        <li>{{ $profile['college_affiliated'] }}</li>
      </ul>
      @endif
      @if(isset($profile['orcid']) || isset($profile['google_scholar_id']))
      <h4>Research profiles</h4>
      <li><a href="https://orcid.org/{{$profile['orcid']}}">ORCID</a></li>
      <li><a href="https://scholar.google.com/citations?user={{ $profile['google_scholar_id']}}">Google Scholar</a></li>
      @endif
    </div>
  @endsection

  @if(!empty($profile['publications']))
  @section('publications')
  <div class="container">
      <h2>Publications</h2>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        {!! $profile['publications'] !!}
      </div>
  </div>
  @endsection
  @endif


  @if(!empty($profile['research_projects']))
  @section('research-projects')
  <div class="container">
    <h2>Associated Research Projects</h2>
    <div class="row">
      @foreach($profile['research_projects'] as $project)
      <div class="col-md-4 mb-3">
        <div class="card card-body h-100 ">
          @if(!is_null($project['research_projects_id']['hero_image']))
          <img class="img-fluid" src="{{ $project['research_projects_id']['hero_image']['data']['thumbnails'][4]['url']}}"/>
          @endif
          <div class="container h-100">
            <div class="contents-label mb-3">
              <h3>
                <a href="research/project/{{ $project['research_projects_id']['slug']}}">{{ $project['research_projects_id']['title']}}</a>
              </h3>
              <p class="card-text">{{ $project['research_projects_id']['summary']}}</p>
            </div>
          </div>
          <a href="research/project/{{ $project['research_projects_id']['slug']}}" class="btn btn-dark">Read more</a>
        </div>

      </div>
      @endforeach
    </div>
  </div>
  @endsection
  @endif

  @if(!empty($profile['departments_affiliated']))
    @section('departments')
    <div class="container">
      <h2>Associated Departments</h2>
      <div class="row">
        @foreach($profile['departments_affiliated'] as $project)
        <div class="col-md-4 mb-3">
          <div class="card card-body h-100 ">
            @if(!is_null($project['department']['hero_image']))
            <img class="img-fluid" src="{{ $project['department']['hero_image']['data']['thumbnails'][4]['url']}}"/>
            @endif
            <div class="container h-100">
              <div class="contents-label mb-3">
                <h3>
                  <a href="departments/{{ $project['department']['slug']}}">{{ $project['department']['title']}}</a>
                </h3>
                <p class="card-text">{{ substr(strip_tags($project['department']['department_description'])),0,200) }}...</p>
              </div>
            </div>
            <a href="departments/{{ $project['department']['slug']}}" class="btn btn-dark">Read more</a>
          </div>

        </div>
        @endforeach
      </div>
    </div>
    @endsection
  @endif

  @if(!empty($profile['research_projects']))
    @section('research-projects')
    <div class="container">
      <h2>Associated Research Projects</h2>
      <div class="row">
        @foreach($profile['research_projects'] as $project)
        <div class="col-md-6 mb-3">
          <div class="card card-body h-100 ">
            @if(!is_null($project['research_projects_id']['hero_image']))
            <img class="img-fluid" src="{{ $project['research_projects_id']['hero_image']['data']['thumbnails'][4]['url']}}"/>
            @endif
            <div class="container h-100">
              <div class="contents-label mb-3">
                <h3>
                  <a href="research/project/{{ $project['research_projects_id']['slug']}}">{{ $project['research_projects_id']['title']}}</a>
                </h3>
                <p class="card-text">{{ substr(strip_tags($project['research_projects_id']['summary']),0,200) }}...</p>
              </div>
            </div>
            <a href="research/project/{{ $project['research_projects_id']['slug']}}" class="btn btn-dark">Read more</a>
          </div>

        </div>
        @endforeach
      </div>
    </div>
    @endsection
  @endif
@endforeach
