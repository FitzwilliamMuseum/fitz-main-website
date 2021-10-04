@extends('layouts.layout')

@foreach($galleries['data'] as $gallery)
  @section('title', $gallery['gallery_name'])
  @section('description', $gallery['meta_description'])
  @section('keywords', $gallery['meta_keywords'])
  @if(isset($gallery['hero_image']['data']['full_url']))
    @section('hero_image', $gallery['hero_image']['data']['url'])
    @section('hero_image_title', $gallery['hero_image_alt_text'])
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
      <x-image-card
      :image="$object['pharos_id']['image']"
      :altTag="$object['pharos_id']['image_alt_text']"
      :route="'highlight'"
      :params="[$object['pharos_id']['slug']]"
      :title="$object['pharos_id']['title']"
      />
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
          <x-ciim-card :record="$record" />
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
