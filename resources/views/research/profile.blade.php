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
    <div class="col-md-12 shadow-sm p-3 mx-auto mb-3">
      <img class="img-fluid float-right thumb-post rounded p-3" src="{{ $profile['profile_image']['data']['thumbnails'][2]['url']}}"
      alt="{{ $profile['profile_image_alt_text'] }}" >
      <h3 class="lead">
      @isset($profile['title'])
      {{ $profile['title'] }}
      @endisset
      {{ $profile['display_name'] }}
      </h3>
      {!! $profile['biography'] !!}
      @isset($profile['job_title'])
        <p>
          Job title: {{ $profile['job_title'] }}
        </p>
      @endisset

      @isset($profile['pronouns'])
        <p>
          Pronouns: {{ $profile['pronouns'] }}
        </p>
      @endisset
      @isset($profile['email_address'])
        <p>
        Email: <a href="mailto:{{ $profile['email_address'] }}">{{ $profile['email_address'] }}</a>
        </p>
      @endisset
    </div>

  @endsection

  @if(!empty($profile['publications']))
    @section('publications')
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

      <div class="container">
        <div class="wrapper center-block">
            <div class="panel panel-default">
              <div class="panel-heading active p-2 mb-2" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h4>Publications</h4>
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in col-md-12 shadow-sm p-3 mx-auto mb-3" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  {!! $profile['publications'] !!}
                </div>
              </div>
            </div>

          @isset($profile['professional_memberships'])
            <div class="panel panel-default">
              <div class="panel-heading active p-2 mb-2" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                    <h4>Professional Memberships</h4>
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse in col-md-12 shadow-sm p-3 mx-auto mb-3" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                  {!! $profile['professional_memberships'] !!}
                </div>
              </div>
            </div>
          @endisset
          @isset($profile['college_affiliated'])
            <div class="panel panel-default">
              <div class="panel-heading active p-2 mb-2" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                    <h4>Affiliations</h4>
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse in col-md-12 shadow-sm p-3 mx-auto mb-3" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                  <ul>
                    <li>{{ $profile['college_affiliated'] }}</li>
                  </ul>
                </div>
              </div>
            </div>
        @endisset
        @php
        $social = array('orcid','githubid','google_scholar_id','twitter_handle');
        @endphp
        @if(Arr::hasAny($profile,$social))
          @if(null !== ($profile['orcid']) || null !== ($profile['githubid']) || null !== ($profile['google_scholar_id']) || null !== ($profile['twitter_handle']) )
          <div class="panel panel-default">
            <div class="panel-heading active p-2 mb-2" role="tab" id="headingFour">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                  <h4>Research and social profiles</h4>
                </a>
              </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse in col-md-12 shadow-sm p-3 mx-auto mb-3" role="tabpanel" aria-labelledby="headingFour">
              <div class="panel-body">
                <ul>

                  @if(isset($profile['orcid']))
                    <li>
                      <a href="https://orcid.org/{{$profile['orcid']}}">ORCID</a>
                    </li>
                  @endif

                  @if(isset($profile['google_scholar_id']))
                    <li>
                      <a href="https://scholar.google.com/citations?user={{ $profile['google_scholar_id']}}">Google Scholar</a>
                    </li>
                  @endif

                  @if(isset($profile['githubid']))
                    <li>
                      <a href="https://github.com/{{ $profile['githubid']}}">Github</a>
                    </li>
                  @endif
                  @if(isset($profile['twitter_handle']))
                    <li>
                      <a href="https://twitter.com/{{ $profile['twitter_handle']}}">Twitter</a>
                    </li>
                  @endif

                </ul>
              </div>
            </div>
          </div>
          @endif
        @endisset
        </div>
      </div>
    </div>
    @endsection
  @endif


  @if(!empty($profile['research_projects']))
    @section('research-projects')
    <div class="container">
      <h3 class="lead">Associated Research Projects</h3>
      <div class="row">
        @foreach($profile['research_projects'] as $project)
          @if(!is_null($project['research_projects_id']))
        <div class="col-md-3 mb-3">
          <div class="card  h-100 ">

            <div class="embed-responsive embed-responsive-4by3">
              <a href="{{ route('research-project', $project['research_projects_id']['slug']) }}"><img class="img-fluid embed-responsive-item" src="{{ $project['research_projects_id']['hero_image']['data']['thumbnails'][4]['url']}}"
              width="{{ $project['research_projects_id']['hero_image']['data']['thumbnails'][4]['width'] }}"
              height="{{ $project['research_projects_id']['hero_image']['data']['thumbnails'][4]['height'] }}"
              alt="{{ $project['research_projects_id']['hero_image_alt_text'] }}"
              loading="lazy"/></a>
            </div>

            <div class="card-body">
              <div class="contents-label mb-3">
                <h3 class="lead">
                  <a href="{{ route('research-project', $project['research_projects_id']['slug']) }}">{{ $project['research_projects_id']['title']}}</a>
                </h3>
              </div>
            </div>

          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
    @endsection
  @endif


  @if(!empty($profile['departments_affiliated']))

    @section('departments-affiliated')
    <div class="container">
      <h3 class="lead">Associated Departments</h3>
      <div class="row">
        @foreach($profile['departments_affiliated'] as $project)
        <div class="col-md-4 mb-3">
          <div class="card  h-100 ">
            @if(!is_null($project['department']['hero_image']))
            <div class="embed-responsive embed-responsive-4by3">
              <a href="{{ route('department', $project['department']['slug']) }}"><img class="img-fluid embed-responsive-item" src="{{ $project['department']['hero_image']['data']['thumbnails'][4]['url']}}"
              alt="{{ $project['department']['hero_image_alt_text'] }}"
              height="{{ $project['department']['hero_image']['data']['thumbnails'][4]['height'] }}"
              width="{{ $project['department']['hero_image']['data']['thumbnails'][4]['width'] }}"
              loading="lazy"/></a>
            </div>
            @endif
            <div class="card-body">
              <div class="contents-label mb-3">
                <h3 class="lead">
                  <a href="{{ route('department', $project['department']['slug']) }}">{{ $project['department']['title']}}</a>
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

  @if(!empty($profile['exhibitions_curated']))
    @section('exhibitions-curated')
    <div class="container">
      <h3 class="lead">Associated Exhibitions</h3>
      <div class="row">
        @foreach($profile['exhibitions_curated'] as $project)
          @if(!is_null($project['exhibition']))
        <div class="col-md-4 mb-3">
          <div class="card  h-100 ">

            <div class="embed-responsive embed-responsive-4by3">
              <a href="{{ route('exhibition', $project['exhibition']['slug']) }}"><img class="img-fluid embed-responsive-item" src="{{ $project['exhibition']['hero_image']['data']['thumbnails'][4]['url']}}"
              width="{{ $project['exhibition']['hero_image']['data']['thumbnails'][4]['width'] }}"
              height="{{ $project['exhibition']['hero_image']['data']['thumbnails'][4]['height'] }}"
              alt="{{ $project['exhibition']['hero_image_alt_text'] }}"
              loading="lazy"/></a>
            </div>

            <div class="card-body">
              <div class="contents-label mb-3">
                <h3 class="lead">
                  <a href="{{ route('exhibition', $project['exhibition']['slug']) }}">{{ $project['exhibition']['exhibition_title']}}</a>
                </h3>
              </div>
            </div>

          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
    @endsection
  @endif

@endforeach
