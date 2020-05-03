@extends('layouts/layout')
@foreach($ltd['data'] as $look)
@section('title','Look, think, do: ' . $look['title_of_work'])

@section('content')
@if(isset($look['focus_image']['data']['full_url']))
@section('hero_image', $look['focus_image']['data']['full_url'])
@section('hero_image_title', $look['object_metadata'])
@endif

@section('content')
<h2>{{ $look['title_of_work'] }}</h2>
<div class="row ">

  <div class="col-md-7 mb-3 rounded">

    <div class="shadow-sm p-3 mb-3 mt-3 rounded">
      <figure class="figure">
        <img src="{{ $look['focus_image']['data']['full_url'] }}"
        class="img-fluid" alt="{{ $look['title_of_work'] }}"/>
      </figure>
      <btn class="btn btn-wine m-1 share">
        <a href="{{ URL::to( $look['focus_image']['data']['full_url'] )  }}"
         download="{{ $look['title_of_work'] }}.jpg"><i class="fas fa-download mr-2"></i>  Download this image</a>
      </btn>
    </div>

    <div class="shadow-sm p-3 mx-auto mb-3 mt-3 rounded">
      <h4>Collections database information</h4>
      @markdown($look['object_metadata'])
    </div>

    <div class="shadow-sm p-3 mx-auto  rounded">
      <h4>Description of this object or artwork</h4>
      @markdown($look['main_text_description'])
    </div>

  </div>
  <div class="col-md-5 mt-3">
    <div class="col shadow-sm p-3 mx-auto mb-3 rounded">
      <h3>Look at the work</h3>
      {!! $look['look_text'] !!}
      @if(isset($look['look_answers']))
      <button type="button" class="btn btn-dark" data-toggle="modal"
      data-target="#lookanswers">
      Answers
    </button>
    @endif
  </div>
  <div class="col shadow-sm p-3 mx-auto mb-3 rounded">
    <h3>Think about this work</h3>
    {!! $look['think_text'] !!}
    @if(isset($look['think_answers']))
    <button type="button" class="btn btn-dark" data-toggle="modal"
    data-target="#thinkanswers">
    Answers
  </button>
  @endif
</div>
<div class="col shadow-sm p-3 mx-auto mb-3 rounded">
  <h3>Do something in response</h3>
  {!! $look['do_text'] !!}
  @if(isset($look['do_answers']))
  <button type="button" class="btn btn-dark" data-toggle="modal"
  data-target="#doanswers">
  Answers
</button>
@endif

</div>
@if(isset($look['adlib_id_number']))
<div class="col shadow-sm p-3 mx-auto mb-3 rounded">
  <h3>Collections record</h3>
  <p>{!! $look['adlib_id_number'] !!}</p>
</div>

@if(!empty($look['associated_pharos']))
<div class="col shadow-sm p-3 mx-auto mb-3 rounde">
  <h3>Pharos record</h3>
  <div class="card card-body h-100">
    @if(!is_null($look['associated_pharos'][0]['pharos_id']['image']))
    <img class="img-fluid" src="{{ $look['associated_pharos'][0]['pharos_id']['image']['data']['thumbnails'][4]['url']}}"/>
    @endif
    <div class="container h-100">

      <div class="contents-label mb-3">
        <h3><a href="/objects-and-artworks/pharos/{{ $look['associated_pharos'][0]['pharos_id']['slug']}}">{{ $look['associated_pharos'][0]['pharos_id']['title']}}</a></h3>
        @if(!empty($record['maker']))<h4><small class="text-muted">{{ $look['associated_pharos'][0]['pharos_id']['maker']}}</small></h4>@endif


        <p class="card-text">{{ substr(strip_tags($look['associated_pharos'][0]['pharos_id']['description']),0,200) }}...</p>

      </div>
    </div>
    <a href="/objects-and-artworks/pharos/{{ $look['associated_pharos'][0]['pharos_id']['slug']}}" class="btn btn-dark">Read more</a>
  </div>

</div>
@endif

@if(!empty($look['sketchfab_id']))
<div class="col shadow-sm p-3 mx-auto mb-3 rounded">
  <h2>3d model</h2>
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
    <div class="embed-responsive embed-responsive-1by1">
      <iframe title="A 3D model" class="embed-responsive-item"
      src="https://sketchfab.com/models/{{ $look['sketchfab_id']}}/embed?"
      frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
    </div>
  </div>
</div>
@endif
@endif
</div>
</div>
@if($look['youtube_id'])
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item "
    src="https://www.youtube.com/embed/{{$look['youtube_id']}}" frameborder="0"
    allowfullscreen></iframe>
  </div>
</div>
@endif
@if($look['vimeo_id'])
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded ">
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item "
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
