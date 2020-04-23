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

      <div class="col-md-7  mx-auto mb-3 rounded">
        <img src="{{ $look['focus_image']['data']['full_url'] }}" class="img-fluid"/>

          <div class="shadow-sm p-3 mx-auto mb-3 mt-3 rounded">
            <h4>{!! $look['object_metadata'] !!}</h4>
          </div>

          <div class="shadow-sm p-3 mx-auto  rounded">
          @markdown($look['main_text_description'])
          </div>

      </div>
      <div class="col-md-4 shadow-sm p-3 mx-auto mb-3 rounded">
         <h3>Look at the work</h3>
         {!! $look['look_text'] !!}
         <h3>Think about this work</h3>
         {!! $look['think_text'] !!}
         <h3>Do something in response</h3>
         {!! $look['do_text'] !!}
         <hr />
         <h3>Collections record</h3>
         <p>{!! $look['adlib_id_number'] !!}</p>
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
@endforeach
