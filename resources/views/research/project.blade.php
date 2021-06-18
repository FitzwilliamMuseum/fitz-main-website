@extends('layouts.layout')

@foreach($projects['data'] as $project)
  @section('keywords', $project['meta_keywords'])
  @section('description', $project['meta_description'])
  @section('title', $project['title'])
  @section('hero_image', $project['hero_image']['data']['thumbnails'][10]['url'])
  @section('hero_image_title', $project['hero_image_alt_text'])
  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
      @markdown($project['project_overview'])
    </div>
    @if(!@empty ($project['project_principal']))

      <h3 class="lead">Project information</h3>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        <ul>
          @if($project['project_principal'])
            <li>Principal Investigator: {{ $project['project_principal']}}</li>
          @endif
          @if($project['co_investigator'])
            <li>Co-Investigator: {{ $project['co_investigator']}}</li>
          @endif
          @if($project['project_start_date'])
            <li>Project start date: {{ Carbon\Carbon::parse($project['project_start_date'])->format('l dS F Y') }}</li>
          @endif
          @if($project['project_end_date'])
            <li>Project end date: {{  Carbon\Carbon::parse($project['project_end_date'])->format('l dS F Y')}}</li>
          @endif
          @if($project['project_url'])
            <li>Project website: <a href="{{ $project['project_url']}}">{{ $project['project_url']}}</a></li>
          @endif
          @if($project['award_value'])
            <li>Funding award value: {{ $project['award_value'] }}</li>
          @endif
          @if($project['funding_reference_id'])
            <li>Funding reference: {{ $project['funding_reference_id'] }}</li>
          @endif
        </ul>
      </div>
    @endif
    @if($project['publications'])
      <h4 class="lead">Related publications</h4>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        @markdown($project['publications'])
      </div>
    @endif

    @if(!empty($project['project_team']))
      <h4 class="lead">Project team</h4>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        @markdown($project['project_team'])
      </div>
    @endif
  @endsection

  @if(!empty($project['project_partnerships'] ))
    @section('research-funders')
      <div class="container">
        <h4 class="lead">Funders and partners</h4>
        <div class="row">
          @foreach($project['project_partnerships'] as $partner)
            <div class="col-md-4 mb-3">
              <div class="card  h-100">
                @if(!is_null( $partner['partner']['partner_logo']))
                  <a href="{{ $partner['partner']['partner_url']}}"><img class="img-fluid" src="{{ $partner['partner']['partner_logo']['data']['thumbnails'][5]['url']}}"
                    alt="Logo for {{ $partner['partner']['partner_full_name']}}"
                    height="{{ $partner['partner']['partner_logo']['data']['thumbnails'][5]['height'] }}"
                    width="{{ $partner['partner']['partner_logo']['data']['thumbnails'][5]['width'] }}"
                    loading="lazy"/></a>
                  @else
                    <img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                    alt="The Fitzwilliam Museum's Gallery 3 roof"
                    loading="lazy"/>
                  @endif
                  <div class="card-body ">
                    <div class="contents-label mb-3">
                      <h3 class="lead">
                        <a href="{{ $partner['partner']['partner_url']}}">{{ $partner['partner']['partner_full_name']}}</a>
                      </h3>
                      <p>{{ $partner['partner']['partner_type'][0]}}</p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endsection
    @endif

    @if(isset($project['outcomes']))
      @section('research-projects')
        <div class="container">
          <h4 class="lead">Outcomes of the project</h4>
          <div class="col-12 shadow-sm p-3 mx-auto mb-3">
            @markdown($project['outcomes'])
          </div>
        </div>
      @endsection
    @endif

    @if($project['youtube_id'])
      @section('youtube')
        <div class="container">
          <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" title="A YouTube video related to this story"
              src="https://www.youtube.com/embed/{{$project['youtube_id']}}" frameborder="0"
              allowfullscreen></iframe>
            </div>
          </div>
        </div>
      @endsection
    @endif

  @endforeach


  @if(!empty($records))
    @section('mlt')
      <div class="container">
        <h4 class="lead">Other research projects you might like</h4>
        <div class="row">
          @foreach($records as $record)
            <div class="col-md-4 mb-3">
              <div class="card  h-100">
                @if(!is_null($record['thumbnail']))
                  <a href="{{ route('research-project', $record['slug'][0]) }}"><img class="img-fluid" src="{{ $record['thumbnail'][0]}}"
                    alt="Featured image for the project: {{ $record['title'][0] }}"
                    loading="lazy"/></a>
                  @else
                    <a href="{{ route('research-project', $record['slug'][0]) }}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                      alt="The Fitzwilliam Museum's gallery 3 roof" loading="lazy"/></a>
                    @endif
                    <div class="card-body h-100">
                      <div class="contents-label mb-3">
                        <h3 class="lead">
                          <a href="{{ route('research-project', $record['slug'][0]) }}">{{ $record['title'][0] }}</a>
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
