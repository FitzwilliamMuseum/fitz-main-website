@extends('layouts/layout')

@foreach($ltd['data'] as $look)
  @section('title','Look, think, do: ' . $look['title_of_work'])
  @section('description', 'A Look Think Do page for ' . $look['title_of_work'])
  @section('keywords', 'look,think,do,activity')
  @if(isset($look['focus_image']['data']['full_url']))
    @section('hero_image', $look['focus_image']['data']['full_url'])
    @section('hero_image_title', $look['object_metadata'])
  @endif

  @section('content')
  <h2>
    {{ $look['title_of_work'] }}
  </h2>

  <div class="row ">
    <!-- Column one -->
    <div class="col-md-7 mb-3">
      <div class="shadow-sm p-3 mb-3 mt-3">
        <figure class="figure">
          <img src="{{ $look['focus_image']['data']['full_url'] }}"
          class="img-fluid" alt="{{ $look['title_of_work'] }}" loading="lazy"
          width="{{ $look['focus_image']['width'] }}"
          height="{{ $look['focus_image']['height'] }}"
          />
        </figure>
        <span class="btn btn-wine m-1 p-2 share">
          <a href="{{ URL::to( $look['focus_image']['data']['full_url'] )  }}" target="_blank"
           download><i class="fas fa-download mr-2"></i>  Download this image</a>
        </span>
        <span class="btn btn-dark p-2">
        <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons Licence" src="https://i.creativecommons.org/l/by-nc-sa/4.0/80x15.png" /></a></span>
      </div>
      <h4>
        Description of this object or artwork
      </h4>
      <div class="shadow-sm p-3 mx-auto">

          @markdown($look['main_text_description'])
      </div>
      @foreach($adlib as $record)
      <h4>
        Collections database information
      </h4>
      <div class="shadow-sm p-3 mx-auto mb-3 mt-3">

            @include('includes/elements/descriptive')

            @include('includes/elements/legal')

            @include('includes/elements/lifecycle')

            @include('includes/elements/measurements')

            @include('includes/elements/agents-subjects')

            @include('includes/elements/medium')

            @include('includes/elements/materials')

            @include('includes/elements/techniques')

            @include('includes/elements/inscriptions')

            @include('includes/elements/department')


            @include('includes/elements/identification')

            @include('includes/elements/institutions')
          </div>
        @endforeach




    </div>
    <!-- End of column one -->

    <!-- column two -->
    <div class="col-md-5 mt-3">
      <h3>
        Look at the work
      </h3>
      <div class="col shadow-sm p-3 mx-auto mb-3">

        {!! $look['look_text'] !!}
        @if(isset($look['look_answers']))
        <button type="button" class="btn btn-dark" data-toggle="modal"
        data-target="#lookanswers">Answers</button>
        @endif
      </div>
      <h3>
        Think about this work
      </h3>
      <div class="col shadow-sm p-3 mx-auto mb-3">

        {!! $look['think_text'] !!}
        @if(isset($look['think_answers']))
        <button type="button" class="btn btn-dark" data-toggle="modal"
        data-target="#thinkanswers">Answers</button>
        @endif
      </div>
      <h3>
        Do something in response
      </h3>
      <div class="col shadow-sm p-3 mx-auto mb-3">

        {!! $look['do_text'] !!}
        @if(isset($look['do_answers']))
        <button type="button" class="btn btn-dark" data-toggle="modal"
        data-target="#doanswers">Answers</button>
        @endif
      </div>

      @if(isset($look['adlib_id_number']))
      <h3>
        Collections record
      </h3>
      <div class="col shadow-sm p-3 mx-auto mb-3">

        <p>{!! $look['adlib_id_number'] !!}</p>
      </div>

      @if(!empty($look['associated_pharos']))
      <h4>
        Highlight record
      </h4>
      <div class="col shadow-sm p-3 mx-auto mb-3 rounde">

        <div class="card card-body h-100">
          @if(!is_null($look['associated_pharos'][0]['pharos_id']['image']))
          <a href="/objects-and-artworks/highlights/{{ $look['associated_pharos'][0]['pharos_id']['slug']}}"><img class="img-fluid" src="{{ $look['associated_pharos'][0]['pharos_id']['image']['data']['thumbnails'][4]['url']}}"
          alt="{{ $look['associated_pharos'][0]['pharos_id']['image_alt_text'] }}"
          loading="lazy"
          width="{{ $look['associated_pharos'][0]['pharos_id']['image']['data']['thumbnails'][4]['width'] }}"
          height="{{ $look['associated_pharos'][0]['pharos_id']['image']['data']['thumbnails'][4]['height'] }}"
          /></a>
          @endif
          <div class="container h-100">
            <div class="contents-label mb-3">
              <h3>
                <a href="/objects-and-artworks/highlights/{{ $look['associated_pharos'][0]['pharos_id']['slug']}}">{{ $look['associated_pharos'][0]['pharos_id']['title']}}</a>
              </h3>
            </div>
          </div>
          <a href="/objects-and-artworks/highlights/{{ $look['associated_pharos'][0]['pharos_id']['slug']}}" class="btn btn-dark">Read more</a>
        </div>
      </div>
      @endif

      <!-- Sketchfab include -->
      @if(!empty($look['sketchfab_id']))
      <h3>3d model</h3>
      <div class="col shadow-sm p-3 mx-auto mb-3">

        <div class="col-12 shadow-sm p-3 mx-auto mb-3">
          <div class="embed-responsive embed-responsive-4by3">
            <iframe title="A 3D model related to {{ $look['title_of_work'] }}" class="embed-responsive-item"
            src="https://sketchfab.com/models/{{ $look['sketchfab_id'] }}/embed?"
            frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
          </div>
        </div>
      </div>
      @endif
      <!-- End of Sketchfab include -->

      @endif
    </div>
    <!-- End of column two -->
  </div>

  @if($look['youtube_id'])
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" title="A YouTube video related to {{ $look['title_of_work'] }}"
      src="https://www.youtube.com/embed/{{ $look['youtube_id'] }}" frameborder="0"
      allowfullscreen></iframe>
    </div>
  </div>
  @endif

  @if($look['vimeo_id'])
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" title="A Vimeo video related to {{ $look['title_of_work'] }}"
      src="https://player.vimeo.com/video/{{$look['vimeo_id']}}" frameborder="0"
      allowfullscreen></iframe>
    </div>
  </div>
  @endif

  @endsection

  @if(isset($look['look_answers']))
    @section('lookanswers')
      @include('includes.elements.lookanswers')
    @endsection
  @endif

  @if(isset($look['think_answers']))
    @section('thinkanswers')
      @include('includes.elements.thinkanswers')
    @endsection
  @endif

  @if(isset($look['do_answers']))
    @section('doanswers')
      @include('includes.elements.doanswers')
    @endsection
  @endif

@endforeach
