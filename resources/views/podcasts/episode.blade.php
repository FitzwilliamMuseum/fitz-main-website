@extends('layouts.layout')
@foreach($podcasts['data'] as $podcast)
  @section('description', $podcast['meta_description'])
  @section('title', $podcast['title'])
  @if(!is_null($podcast['hero_image']))
    @section('hero_image', $podcast['hero_image']['data']['full_url'])
    @section('hero_image_title', $podcast['hero_image_alt_tag'])
  @endif

  @section('content')


    <div class="row ">
      <!-- Column one -->
      <div class="col-md-7 mb-3">
        <div class=" shadow-sm p-3 mb-3 mt-3">
          <figure class="figure">
            <img src="{{ $podcast['hero_image']['data']['full_url'] }}"
            class="img-fluid" alt="{{ $podcast['title'] }}" loading="lazy"
            width="{{ $podcast['hero_image']['width'] }}"
            height="{{ $podcast['hero_image']['height'] }}"
            />
          </figure>
      

        </div>
      </div>
      <!-- End of column one -->

      <!-- column two -->
      <div class="col-md-5 mt-3">
        <div class="col shadow-sm p-3 mx-auto mb-3">
          {{ $podcast['description'] }}
        </div>

        <div class="col shadow-sm p-3 mx-auto mb-3">
          <div class="plyr">
            <div class="embed-responsive  audio-player">
              <audio id="player" controls class="embed-responsive-item">
                <source src="{{ $podcast['mp3_id'] }}" type="audio/mp3">
              </audio>
              </div>
            </div>
          </div>
      </div>
      <!-- End of column two -->

    </div>



  @endsection
@endforeach
