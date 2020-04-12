@extends('layouts/layout')
@foreach($ltd['data'] as $look)
@section('title','Look, think, do:' . $look['title_of_work'])

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
        <br />
        <h4>{!! $look['object_metadata'] !!}</h4>
        <div class="row">
          {!! $look['main_text_description'] !!}
        </div>
      </div>
      <div class="col-md-4 shadow-sm p-3 mx-auto mb-3 rounded">
         <h3>Look at the work</h3>
         {!! $look['look_text'] !!}
         <h3>Think about this work</h3>
         {!! $look['think_text'] !!}
         <h3>Do someything in response</h3>
         {!! $look['do_text'] !!}
      </div>

    </div>
  @endsection
@endforeach
