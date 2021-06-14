@extends('layouts/layout')

@foreach($galleries['data'] as $gallery)
  @section('title', $gallery['gallery_name'])
  @section('description', $gallery['meta_description'])
  @section('keywords', $gallery['meta_keywords'])
  @if(isset($gallery['hero_image']['data']['full_url']))
    @section('hero_image', $gallery['hero_image']['data']['full_url'])
    @section('hero_image_title', $gallery['hero_image_alt_text'])
    @section('social_thumbnail', $gallery['hero_image']['data']['full_url'])
  @endif

  @section('content')
  @if(!empty($gallery['gallery_status']))
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
      @foreach($gallery['gallery_status'] as $status)
        <span class="badge badge-wine">{{ $status }}</span>
      @endforeach
    </div>
  @endif

  @if(isset($gallery['gallery_description']))
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
      @markdown($gallery['gallery_description'])
    </div>
  @endif

  @if(isset($gallery['gallery_floor']))
    <h4 class="lead">
      Gallery data
    </h4>
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
      <ul>
        <li>{{ $gallery['gallery_floor'] }}</li>
      </ul>
    </div>
  @endif

  @if(!empty($gallery['star_objects']))
  <h4 class="lead">
    Object stories
  </h4>
  <div class="row">
    @foreach($gallery['star_objects'] as $object)
    <div class="col-md-4 mb-3">
      <div class="card  h-100 ">
        @if(!is_null($object['pharos_id']['image']))
        <div class="embed-responsive embed-responsive-4by3">
          <img class="img-fluid embed-responsive-item" src="{{ $object['pharos_id']['image']['data']['thumbnails'][4]['url'] }}"
          alt="{{ $object['pharos_id']['image_alt_text'] }}"
          loading="lazy"
          width="{{ $object['pharos_id']['image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $object['pharos_id']['image']['data']['thumbnails'][4]['height'] }}"/>
        </div>
        @endif
        <div class="card-body">
          <div class="contents-label mb-3">
            <h3 class="lead">
              <a href="{{ route('highlight', [$object['pharos_id']['slug']]) }}">@markdown($object['pharos_id']['title'])</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endif

  @isset($gallery['object_id_numbers'])
    @inject('galleriesController', 'App\Http\Controllers\galleriesController')
    @php
    $records = $galleriesController::getObjects($gallery['object_id_numbers']);
    // @dd($records);
    @endphp
    @if(!empty($records))
      <h3 class="lead">
        Selected objects in gallery {{ $gallery['gallery_name'] }}
      </h3>
      <div class="row">
        @foreach($records as $record)
        @php
        $pris = Arr::pluck($record['_source']['identifier'],'priref');
        $pris = array_filter($pris);
        $pris= Arr::flatten($pris);
        @endphp

        <div class="col-md-4 mb-3">
          <div class="card h-100">
            <div class="results_image">
              @if(array_key_exists('multimedia', $record['_source']))
                <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}"><img class="results_image__thumbnail" src="{{ env('COLLECTION_URL') }}/imagestore/{{ $record['_source']['multimedia'][0]['processed']['preview']['location'] }}"
                  loading="lazy" alt="An image of {{ ucfirst($record['_source']['summary_title']) }}"
                  /></a>
                @else
                  <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}"><img class="results_image__thumbnail" src="https://content.fitz.ms/fitz-website/assets/no-image-available.png?key=directus-medium-crop"
                    alt="A stand in image for {{ ucfirst($record['_source']['summary_title']) }}}"/></a>
                  @endif
                </div>
                <div class="card-body ">
                  <div class="contents-label mb-3">
                    <h3 class="lead ">
                      @if(array_key_exists('title',$record['_source'] ))
                        <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}">{{ ucfirst($record['_source']['title'][0]['value']) }}</a>
                      @else
                        <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}">{{ ucfirst($record['_source']['summary_title']) }}</a>
                      @endif            </h3>
                      <p class="text-info">{{ $record['_source']['identifier'][0]['accession_number'] }}</p>

                    </div>
                  </div>
                </div>
              </div>
          @endforeach
        </div>
      @endif
  @endisset
  @endsection



  @if(!empty($gallery['audio_guide']))
    @section('audio-guide')
      <div class="container">
        <h4 class="lead">
          Audio description
        </h4>
        <div class="col-12 shadow-sm p-3 mx-auto mb-3">
          <div class="shadow-sm p-3 mx-auto mb-3">
            <div class="plyr">
              <div class="embed-responsive audio-player">
                <audio id="player" controls class="embed-responsive-item">
                  <source src="{{ $gallery['audio_guide']['data']['full_url'] }}" type="audio/aac">
                  </audio>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endsection
    @endif

    @section('360')
      @if(!empty($gallery['image_360_pano']))
        <div class="container">
          <h4 class="lead">{{ $gallery['360_pano_title'] }}: {{ Carbon\Carbon::parse($gallery['360_pano_date'])->format('F Y') }}</h4>

          <div class="col-12 shadow-sm p-3 mx-auto mb-3">
            <div id="panorama"></div>
          </div>
        </div>
        @section('360_image', $gallery['image_360_pano']['data']['full_url']))
      @endif
    @endsection

    @section('sketchfab-collection')
      @if(!empty($gallery['sketchfab_id_collection']))
      <div class="container">
        <h4 class="lead">3D scans of objects in gallery</h4>
        <div class="col-12 shadow-sm p-3 mx-auto mb-3">
          <div class="embed-responsive embed-responsive-4by3">
            <iframe title="A 3D model of {{ $gallery['gallery_name'] }}" class="embed-responsive-item"
            src="https://sketchfab.com/playlists/embed?collection={{ $gallery['sketchfab_id_collection']}}"
            frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
          </div>
        </div>
      </div>
      @endif
    @endsection

    @section('sketchfab')
      @if(!empty($gallery['sketchfab_sketchup_id']))
      <div class="container">
        <h4 class="lead">Sketchup model of this gallery</h4>
        <div class="col-12 shadow-sm p-3 mx-auto mb-3">
          <div class="embed-responsive embed-responsive-4by3">
            <iframe title="A 3D sketchup model related to {{ $gallery['gallery_name']  }}" class="embed-responsive-item"
            src="https://sketchfab.com/models/{{ $gallery['sketchfab_sketchup_id']}}/embed?"
            frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
          </div>
        </div>
      </div>
      @endif
    @endsection

@endforeach
