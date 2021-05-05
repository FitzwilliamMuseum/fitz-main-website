@extends('layouts.layout')
@foreach($opps['data'] as $opp)
  @section('description', $opp['meta_description'])
  @section('title', $opp['title'])
  @if(!is_null($opp['hero_image']))
  @section('hero_image', $opp['hero_image']['data']['full_url'])
  @section('hero_image_title', $opp['hero_image_alt_text'])
@endif
  @section('content')
    <div class="col-md-12 shadow-sm p-3 mx-auto mb-3">
      {!! $opp['description'] !!}
    </div>
  @endsection
@endforeach
