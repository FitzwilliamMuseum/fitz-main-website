@extends('layouts.layout')
@section('title','Research opportunities')
@section('hero_image',env('CONTENT_STORE') . 'baroque.jpg')
@section('hero_image_title', 'A Baroque feasting table by Ivan Day in feast and fast')
@section('description', 'An overview of available research opportunities')
@section('content')
  @if(count($opps['data']) > 0)
    <div class="row">
      @foreach($opps['data'] as $opp)
        <x-image-card :altTag="$opp['hero_image_alt_text'] " :title="$opp['title']"  :image="$opp['hero_image']" :route="'opportunity'" :params="[$opp['slug']]" />
      @endforeach
    </div>
    @else
      <div class="col-md-12 shadow-sm p-3 mx-auto mb-3">
        <p>We currently have no opportunities available.</p>
      </div>
    @endif
  </div>
@endsection
