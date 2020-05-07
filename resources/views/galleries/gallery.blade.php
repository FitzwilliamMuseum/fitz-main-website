@extends('layouts/layout')
@foreach($galleries['data'] as $gallery)
  @section('title', $gallery['gallery_name'])
  @if(isset($gallery['hero_image']['data']['full_url']))
  @section('hero_image', $gallery['hero_image']['data']['full_url'])
  @section('hero_image_title', $gallery['hero_image_alt_text'])
  @endif
  @section('content')
      <h2>{{ $gallery['gallery_name'] }}</h2>

      @if(!empty($gallery['gallery_status']))
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        @foreach($gallery['gallery_status'] as $status)
          <span class="badge badge-wine">{{$status}}</span>
        @endforeach
      </div>
      @endif
      @if(isset($gallery['gallery_description']))
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        @markdown($gallery['gallery_description'])
      </div>
      @endif
      @if(isset($gallery['gallery_floor']))
      <h3>Gallery data</h3>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        <ul>
          <li>{{ $gallery['gallery_floor']}}</li>
      </div>
      @endif
      <h3>Highlight objects from Pharos</h3>
      <div class="row">
          @foreach($gallery['star_objects'] as $object)
            <div class="col-md-4 mb-3">
            <div class="card card-body h-100 ">
              @if(!is_null($object['pharos_id']['image']))
              <img class="img-fluid" src="{{ $object['pharos_id']['image']['data']['thumbnails'][2]['url']}}"/>
                @endif
            <div class="container h-100">
              <div class="contents-label mb-3">
              <h3>
                <a href="/objects-and-artworks/pharos/{{ $object['pharos_id']['slug']}}">{{ $object['pharos_id']['title']}}</a>
              </h3>
                <p class="card-text">{{ substr(strip_tags(htmlspecialchars_decode($object['pharos_id']['description'])),0,200) }}...</p>
              </div>
            </div>
            <a href="/objects-and-artworks/pharos/{{ $object['pharos_id']['slug']}}" class="btn btn-dark">Read more</a>
          </div>
          </div>
          @endforeach
      </div>
  @endsection



  @if(!empty($gallery['audio_guide']))
  @section('audio-guide')
  <div class="container">
    <h3>Audio description</h3>

    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
      <div class="shadow-sm p-3 mx-auto mb-3 rounded">
        <div class="plyr">
          <div class="embed-responsive audio-player">
            <audio id="player" controls class="embed-responsive-item">
              <source src="{{ $gallery['audio_guide']['data']['full_url'] }}" type="audio/aac">
              </audio>
            </div>
          </div>
        </div>

      </div>
    </div>  @endsection
  @endif

  @section('360')
  @if(!empty($gallery['image_360_pano']))
  <div class="container">
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
      <div id="panorama"></div>
    </div>
  </div>
  @section('360_image', $gallery['image_360_pano']['data']['full_url']))
  @endif
  @endsection
  @section('sketchfab-collection')

    @if(!empty($gallery['sketchfab_id_collection']))
    <div class="container">
      <h3>3D scans of objects in gallery</h3>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        <div class="embed-responsive embed-responsive-1by1">
          <iframe title="A 3D model" class="embed-responsive-item"
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
      <h2>Sketchup model of this gallery</h2>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        <div class="embed-responsive embed-responsive-1by1">
          <iframe title="A 3D model" class="embed-responsive-item"
          src="https://sketchfab.com/models/{{ $gallery['sketchfab_sketchup_id']}}/embed?"
          frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
        </div>
      </div>
    </div>
    @endif
  @endsection
@endforeach
