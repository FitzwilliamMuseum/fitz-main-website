@extends('layouts.exhibitions')

@foreach($exhibitions['data'] as $coll)
  @section('keywords', $coll['meta_keywords'])
  @section('description', $coll['meta_description'])
  @section('title', $coll['exhibition_title'])
  @section('hero_image', $coll['hero_image']['data']['url'])
  @section('hero_image_title', $coll['hero_image_alt_text'])
  @php
    switch($coll['type']){
      case 'exhibition':
        $type = 'Exhibition';
      break;
      case 'display':
        $type = 'Temporary Display';
        break;
      default:
        $type = 'Exhibition';
    }
  @endphp
  @section('content')

    @isset($coll['tessitura_string'])
      @if(!Carbon\Carbon::parse($coll['exhibition_end_date'])->isPast() && !Carbon\Carbon::parse($coll['exhibition_end_date'])->isPast())
        @include('includes.structure.tessitura')
      @endif
    @endisset
    @isset($coll['exhibition_end_date'])
      @if(Carbon\Carbon::parse($coll['exhibition_end_date'])->isPast())
        @include('includes.structure.expired')
      @endif
    @endisset
    @if($coll['tessitura_string'] === NULL)
      @if(!Carbon\Carbon::parse($coll['exhibition_end_date'])->isPast() && !Carbon\Carbon::parse($coll['exhibition_end_date'])->isPast() && $coll['exhibition_status'] === 'current')
        @include('includes.structure.general')
      @endif
    @endisset

    <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
      @markdown($coll['exhibition_narrative'])
      @if(isset($coll['exhibition_abstract']))
        @markdown($coll['exhibition_abstract'])
      @endif
    </div>

    @if(!empty($podcasts))
      @section('exhibitionAudio')
        <div class="container-fluid bg-gdbo py-2 mb-2">
          <div class="container">
            <h3 class="lead">Audio and labels</h3>
            <div class="row">
            @foreach($podcasts['data'] as $podcast)
              <x-image-card :altTag="$podcast['hero_image_alt_tag']" :title="$podcast['title']"
              :image="$podcast['hero_image']" :route="'podcasts.episode'" :params="array('slug' => $podcast['slug'])" />
            @endforeach
            </div>
          </div>
        </div>
      @endsection
    @endif

    @if(isset($coll['youtube_id']))
      <h3 class="lead">
        {{ $type }} films
      </h3>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" title="A film related to {{ $coll['exhibition_title'] }}"
          loading="lazy"
          src="https://www.youtube.com/embed/{{$coll['youtube_id']}}" frameborder="0"
          allowfullscreen></iframe>
        </div>
      </div>
    @endif

    @if(isset($coll['youtube_secondary_id']))
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" title="A film related to {{ $coll['exhibition_title'] }}"
          loading="lazy"
          src="https://www.youtube.com/embed/{{$coll['youtube_secondary_id']}}" frameborder="0"
          allowfullscreen></iframe>
        </div>
      </div>
    @endif


    @if( isset($coll['exhibition_url']) || isset($coll['exhibition_start_date']))
      <h3 class="lead">{{$type}} details</h3>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        <ul>
          @if(isset($coll['exhibition_url']))
            <li>
              <a href="{{ $coll['exhibition_url']  }}">{{$type}} website</a>
            </li>
          @endif
          @if(isset($coll['exhibition_start_date']))
            <li>
              {{$type}} run: {{  Carbon\Carbon::parse($coll['exhibition_start_date'])->format('l dS F Y') }} to
              {{  Carbon\Carbon::parse($coll['exhibition_end_date'])->format('l dS F Y') }}
            </li>
          @endif
        </ul>
      </div>
    @endif

    @if(!empty($coll['exhibition_files']))
      <h3 class="lead">{{$type}} files</h3>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
        <ul>
          @foreach($coll['exhibition_files'] as $file)
            <li>
              <a href="{{ $file['directus_files_id']['data']['full_url'] }}">{{ $file['directus_files_id']['title'] }}</a>
            </li>
          @endforeach
        </ul>
      </div>
    @endif
    @isset($adlib)
    <h3 class="lead">Selected objects from the {{$type}}</h3>
    <div class="row">
    @foreach($adlib as $record)
          @php
          $pris = Arr::pluck($record['_source']['identifier'],'priref');
          $pris = array_filter($pris);
          $pris= Arr::flatten($pris);
          @endphp
          <div class="col-md-4 mb-3">
            <div class="card h-100">
              <div class="results_image">
              @if(array_key_exists('multimedia', $record['_source']))
                <a href="{{ env('COLLECTION_URL')}}/id/object/{{ $pris[0] }}"><img class="results_image__thumbnail" src="{{ env('COLLECTION_URL')}}/imagestore/{{ $record['_source']['multimedia'][0]['processed']['preview']['location'] }}"
                 loading="lazy" alt="An image of {{ ucfirst($record['_source']['summary_title']) }}"
                /></a>
              @else
                <a href="{{ env('COLLECTION_URL')}}/id/object/{{ $pris[0] }}"><img class="results_image__thumbnail" src="https://content.fitz.ms/fitz-website/assets/no-image-available.png?key=directus-medium-crop"
                alt="A stand in image for {{ ucfirst($record['_source']['summary_title']) }}}"/></a>
              @endif
              </div>
              <div class="card-body ">

                <div class="contents-label mb-3">
                  <h3 class="lead">
                  <a href="{{ env('COLLECTION_URL')}}/id/object/{{ $pris[0] }}" class="stretched-link">{{ ucfirst($record['_source']['summary_title']) }}</a>
                  </h3>
                  <p>
                    @if(array_key_exists('department', $record['_source']))
                      {{ $record['_source']['identifier'][0]['accession_number'] }}<br/>
                    @endif
                  </p>
                </div>
              </div>
            </div>
          </div>
    @endforeach
  </div>
    @endisset

  @endsection

  @if(!empty($coll['associated_curators']))
    @section('curators')
      <div class="container-fluid bg-grey py-2 mb-2">
        <div class="container">
          <h3 class="lead">Associated curators</h3>
          <div class="row">
            @foreach($coll['associated_curators'] as $curator)
              <x-image-card :altTag="$curator['staff_profiles_id']['display_name']" :title="$curator['staff_profiles_id']['display_name']"
              :image="$curator['staff_profiles_id']['profile_image']" :route="'research-profile'" :params="array('slug' => $curator['staff_profiles_id']['slug'])" />
              @endforeach
            </div>
          </div>
      </div>
      @endsection
    @endif

    @if(!empty($coll['exhibition_partners'] ))
      @section('research-funders')
        <div class="container">
          <h3 class="lead">Funders and partners</h3>
          <div class="row">
            @foreach($coll['exhibition_partners'] as $partner)
              <div class="col-md-4 mb-3">
                <div class="card  h-100">
                  @if(!is_null( $partner['partner']['partner_logo']))
                    <div class="embed-responsive embed-responsive-4by3">
                      <img class="img-fluid embed-responsive-item" src="{{ $partner['partner']['partner_logo']['data']['thumbnails'][4]['url']}}"
                      alt="Logo for {{ $partner['partner']['partner_full_name']}}"
                      height="{{ $partner['partner']['partner_logo']['data']['thumbnails'][4]['height'] }}"
                      width="{{ $partner['partner']['partner_logo']['data']['thumbnails'][4]['width'] }}"
                      loading="lazy"/>
                    </div>
                  @else
                    <div class="embed-responsive embed-responsive-4by3">
                      <img class="img-fluid embed-responsive-item" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                      alt="The Fitzwilliam Museum's Gallery 3 roof"
                      loading="lazy"/>
                    </div>
                  @endif
                  <div class="card-body">
                    <div class="contents-label mb-3">
                      <h3>
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

    @if(!empty($coll['associated_departments']))
      @section('departments')
        <div class="container">
          <h3 class="lead">Associated departments</h3>
          <div class="row">
            @foreach($coll['associated_departments'] as $gallery)
              <div class="col-md-4 mb-3">
                <div class="card  h-100">
                  @if(!is_null($gallery['departments_id']['hero_image']))
                    <div class="embed-responsive embed-responsive-4by3">
                      <a href="{{ route('department', $gallery['departments_id']['slug']) }}"><img class="img-fluid embed-responsive-item" src="{{ $gallery['departments_id']['hero_image']['data']['thumbnails'][4]['url']}}"
                        loading="lazy" alt="Highlight image for {{ gallery['departments_id']['hero_image_alt_text'] }}"
                        height="{{ $gallery['departments_id']['hero_image']['data']['thumbnails'][4]['height'] }}"
                        width="{{ $gallery['departments_id']['hero_image']['data']['thumbnails'][4]['width'] }}"
                        /></a>
                      </div>
                    @endif
                    <div class="card-body ">
                      <div class="contents-label mb-3">
                        <h3 class="lead">
                          <a href="/departments/{{ $gallery['departments_id']['slug']}}" class="stretched-link">{{ $gallery['departments_id']['title']}}</a>
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


      @if(!empty($coll['exhibition_carousel']))
        @section('excarousel')
          <div class="container">
            <h3 class="lead">Selected images</h3>
            <div class="bd-example mb-3">
              <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="false">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item">
                    <img class="d-block w-100" alt="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_one_alt_text'] }}" src="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_one']['data']['thumbnails'][9]['url'] }}" >
                    <div class="carousel-caption w-100 d-none d-md-block text-white bg-black exhibition-carousel">
                      <h5 class="text-black">{{ $coll['exhibition_carousel'][0]['carousels_id']['image_one_alt_text'] }}</h5>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" alt="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_two_alt_text'] }}" src="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_two']['data']['thumbnails'][9]['url'] }}" >
                    <div class="carousel-caption d-none d-md-block text-white bg-black exhibition-carousel">
                      <h5>{{ $coll['exhibition_carousel'][0]['carousels_id']['image_two_alt_text'] }}</h5>
                    </div>
                  </div>
                  <div class="carousel-item active">
                    <img class="d-block w-100" alt="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_three_alt_text'] }}" src="{{ $coll['exhibition_carousel'][0]['carousels_id']['image_three']['data']['thumbnails'][9]['url'] }}" >
                    <div class="carousel-caption  d-none d-md-block text-white bg-black exhibition-carousel">
                      <h5>{{ $coll['exhibition_carousel'][0]['carousels_id']['image_three_alt_text'] }}</h5>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      @endsection
    @endif

    @if(!empty($coll['associated_galleries']))
      @section('galleries')
        <div class="container-fluid bg-dark text-white py-2 mb-2">
          <div class="container">
            <h3 class="lead">Associated Galleries</h3>
            <div class="row">
              @foreach($coll['associated_galleries'] as $gallery)
                <div class="col-md-4 mb-3">
                  <div class="card  h-100">
                    @if(!is_null($gallery['galleries_id']['hero_image']))
                      <a href="{{ route('gallery', $gallery['galleries_id']['slug']) }}"><img class="img-fluid" src="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['url']}}" loading="lazy"
                        alt="A highlight image of {{ $gallery['galleries_id']['hero_image_alt_text'] }}"
                        height="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['height'] }}"
                        width="{{ $gallery['galleries_id']['hero_image']['data']['thumbnails'][4]['width'] }}"
                        /></a>
                      @endif
                      <div class="card-body h-100">
                        <div class="contents-label mb-3">
                          <h3 class="lead">
                            <a href="{{ route('gallery', $gallery['galleries_id']['slug']) }}" class="stretched-link">{{ $gallery['galleries_id']['gallery_name']}}</a>
                          </h3>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        @endsection
      @endif

      @section('360')
        @if(!empty($coll['image_360_pano']))
          <div class="container">
            <h3 class="lead">360 gallery image</h3>
            <div class="col-12 shadow-sm p-3 mx-auto mb-3">
              <div id="panorama"></div>
            </div>
          </div>
          @section('360_image', $coll['image_360_pano']['data']['full_url']))
        @endif
      @endsection

    @endforeach

    @if(!empty($records))
      @section('mlt')
        <div class="container">
          <h3 class="lead">Similar exhibitions from our archives</h3>
          <div class="row">
            @foreach($records as $record)
              <div class="col-md-4 mb-3">
                <div class="card h-100">
                  @if(!is_null($record['smallimage']))
                    <div class="embed-responsive embed-responsive-4by3">
                      <img class="img-fluid embed-responsive-item" src="{{ $record['smallimage'][0]}}"
                      alt="Highlight image for {{ $record['title'][0] }}" loading="lazy"/>
                    </div>
                  @endif
                  <div class="card-body ">
                    <div class="contents-label mb-3">
                      <h3 class="lead">
                        <a href="/visit-us/exhibitions/{{ $record['slug'][0] }}" class="stretched-link">{{ $record['title'][0] }}</a>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endsection


      @section('sketchfab')
        @if(!empty($coll['sketchfab_id']))
        <div class="container">
          <h4 class="lead">3d model of this display or exhibition</h4>
          <div class="col-12 shadow-sm p-3 mx-auto mb-3">
            <div class="embed-responsive embed-responsive-4by3">
              <iframe title="A 3D  model related to this exhibition" class="embed-responsive-item"
              src="https://sketchfab.com/models/{{ $coll['sketchfab_id']}}/embed?"
              frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
            </div>
          </div>
        </div>
        @endif
      @endsection
    @endif
