@extends('layouts/layout')
@section('title', 'Look, think, do')

@section('content')
@endsection
@foreach($ltd['data'] as $look)
  @section('title','Look, think, do: $look['title_of_work']')
  @if(isset($look['field_image']['data']['full_url']))
  @section('hero_image', $look['field_image']['data']['full_url'])
  @endif

  @section('content')
      <h2>{{ $look['title_of_work'] }}</h2>
      <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
        <h3>{{  Carbon\Carbon::parse($look['publication_date'])->format('l dS F Y') }}</h3
        {!! $look['article_body']) !!}
      </div>
  @endsection
@endforeach
