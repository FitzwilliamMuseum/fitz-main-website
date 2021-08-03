@extends('layouts.home')

@section('hero_image','https://content.fitz.ms/fitz-website/assets/front.jpg')
@section('hero_image_title','The founder\'s building entrance ceiling')
@section('parallax_home', 'https://content.fitz.ms/fitz-website/assets/10.1.m.15_f7r_3_201811_amt49_mas.jpg')
@section('parallax_two', 'https://content.fitz.ms/fitz-website/assets/10.1.m.15_f7r_3_201811_amt49_mas.jpg')
@section('parallax_three', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/aramesh.jpg')
@section('parallax_four', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/e1a3159c12ca0f5091e3e9e5000ad4d0-landscape.jpg')
@section('parallax_three_lower', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/aramesh.jpg')
@section('description', 'Welcome to the Website for the Fitzwilliam Museum, the University of Cambridge\'s principal museum')
@section('keywords', 'fitzwilliam, museum, cambridge, university, art, design, archaeology')
@section('title', 'The Fitzwilliam Museum')


@section('news')
  @foreach($news['data'] as $project)
    <div class="col-md-4 mb-3">
      <div class="card  h-100">
        @if(!is_null($project['field_image']))
          <a href="{{ route('article', $project['slug']) }}"><img class="img-fluid" src="{{ $project['field_image']['data']['thumbnails'][4]['url']}}"
            alt="{{ $project['field_image_alt_text'] }}" /></a>
          @endif
          <div class="card-body h-100">
            <div class="contents-label mb-3">
              <h3 class="lead">
                <a href="{{ route('article', $project['slug']) }}">{{ $project['article_title']}}</a>
              </h3>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  @endsection

  @section('fundraising')
    <div class="container mt-3">
      <h2 class="lead"><a href="{{ route('landing', 'support-us') }}">Donate, become a member or support us</a></h2>
      <div class="row">
        @foreach($fundraising['data'] as $project)
          <div class="col-md-4 mb-3">
            <div class="card  h-100">
              @if(!is_null($project['hero_image']))
                <a href="{{ $project['url']}}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
                  alt="{{ $project['hero_image_alt_text'] }}" /></a>
                @endif
                <div class="card-body h-100">
                  <div class="contents-label mb-3">
                    <h3 class="lead">
                      <a href="{{ $project['url']}}">{{ $project['title']}}</a>
                    </h3>
                    @isset($project['sub_title'])
                      <p class="text-info">{{ $project['sub_title']}}</p>
                    @endisset
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endsection


    @section('research')
      @foreach($research['data'] as $project)
        <div class="col-md-4 mb-3">
          <div class="card h-100">
            @if(!is_null($project['hero_image']))
              <a href="{{ route('research-project', $project['slug']) }}"><img class="img-fluid" src="{{ $project['hero_image']['data']['thumbnails'][4]['url']}}"
                alt="{{ $project['hero_image_alt_text'] }}" loading="lazy"
                width="{{ $project['hero_image']['data']['thumbnails'][4]['width'] }}"
                height="{{ $project['hero_image']['data']['thumbnails'][4]['height'] }}" /></a>
              @endif
              <div class="card-body  h-100">
                <div class="contents-label mb-3">
                  <h3 class="lead">
                    <a href="{{ route('research-project', $project['slug']) }}">{{ $project['title']}}</a>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endsection

      @section('themes')
        @foreach($objects['data'] as $theme)
          <div class="col-md-4 mb-3">
            <div class="card h-100">
              @if(!is_null($theme['image']))
                <a href="{{ route('highlight', $theme['slug']) }}"><img class="img-fluid" src="{{ $theme['image']['data']['thumbnails'][4]['url']}}"
                  alt="{{ $theme['image_alt_text'] }}"
                  loading="lazy"
                  height="{{ $theme['image']['data']['thumbnails'][4]['height'] }}"
                  width="{{ $theme['image']['data']['thumbnails'][4]['width'] }}"/></a>
                @endif
                <div class="card-body  h-100">
                  <div class="contents-label mb-3">
                    <h3 class="lead">
                      <a href="{{ route('highlight', $theme['slug']) }}">@markdown($theme['title'])</a>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endsection



    @if(!empty($shopify))
      @section('shopify')
        <div class="container">
          <h2 class="mt-3 lead"><a href="https://curatingcambridge.co.uk/collections/the-fitzwilliam-museum">Gifts from the Fitzwilliam Museum shop</a></h2>
          <div class="row">
            @foreach($shopify as $record)
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  @if(!is_null($record['thumbnail']))
                    <div class="results_image">
                      <a href="{{ $record['url'][0] }}"><img class="img-fluid results_image__thumbnail" src="{{ $record['thumbnail'][0]}}"
                        alt="Featured image for the project: {{ $record['title'][0] }}"
                        loading="lazy"/></a>
                      </div>
                    @else
                      <a href="{{ $record['url'][0] }}"><img class="img-fluid" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                        alt="The Fitzwilliam Museum's gallery 3 roof" loading="lazy"/></a>
                      @endif
                      <div class="card-body h-100">
                        <div class="contents-label mb-3">
                          <h5 class="lead">
                            <a href="{{ $record['url'][0]  }}">{{ $record['title'][0] }}</a>
                          </h5>
                          <p>£{{ number_format((float)$record['price'][0], 2, '.', '') }}</p>

                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endsection
        @endif

@isset($productions)
  @if(!empty($productions))
  @section('productions')
  <div class="container mt-3">
    <h2 class="lead"><a href="{{ route('events') }}">Upcoming Lectures and virtual events</a></h2>
    <div class="row">
      @php
      $types = Arr::pluck($productions, 'FacilityDescription');
      $ids = Arr::pluck($productions, 'Facility');
      $tags = array_count_values($types);
      usort($productions, function($a, $b) {
        return strtotime($a->PerformanceDate) - strtotime($b->PerformanceDate);
      });
      @endphp
        @foreach($productions as $production)
          <div class="col-md-4 mb-3">
            <div class="card h-100">
              @if($production->Facility->Id === 21)
                <a class="stretched-link" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}"><img class="card-img-top" src="@tessitura($production->ProductionSeason->Id)"
                  alt="A stand in image for "/></a>
                @elseif($production->Facility->Id === 56)
                  <a class="stretched-link" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}"><img class="card-img-top" src="@tessitura($production->PerformanceId )"
                    alt="A stand in image for "/></a>
                @else
                  <a class="stretched-link" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}"><img class="card-img-top" src="@tessitura($production->ProductionSeason->Id)"
                    alt="A stand in image for "/></a>
                  @endif
                  <div class="card-body ">
                    <div class="contents-label mb-3">
                      <h3 class="lead">
                        <a class="stretched-link" href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">{{ $production->PerformanceDescription }}</a>
                      </h3>
                      <h5 class="lead">
                        {{ Carbon\Carbon::parse($production->PerformanceDate)->format('l j F Y')  }}
                      </h5>
                      @if($production->PerformanceDescription === 'The Human Touch')
                        <p>This includes general admission</p>
                      @endif

                      @if($production->PerformanceStatusDescription == 'Cancelled')
                        <p class="text-danger text-uppercase">{{ $production->PerformanceStatusDescription }}</p>
                      @endif
                      @php
                      $tmp = \App\TessituraApi::getPerfPrices($production->PerformanceId);
                    @endphp
                    @isset($tmp[0]->Price)
                      @if($tmp[0]->Price > 0 )
                        <p class="text-info">
                          @fa('pound-sign') @fa('ticket-alt')<br/>
                          From £{{ $tmp[0]->Price }}
                        </p>
                      @else
                        <p class="text-info">FREE ENTRY/ Suggested Donation<br/>{{$production->FacilityDescription}}</p>
                      @endif
                    @endisset

                    {{-- <p>
                    <span class="lead">{{ $production->Season->Description }}</span>
                    {{-- <br/>
                    {{ $production->ZoneMapDescription }} --}}
                    {{-- </p> --}}
                    {{-- <p>
                    {!! ucfirst(nl2br($production->SalesNotes)) !!}
                  </p> --}}
                  @isset($production->Duration)
                    <p>Duration: {{ $production->Duration }} minutes</p>
                  @endisset
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endsection
@endif
@endisset
