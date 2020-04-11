@extends('layouts/layout')

@section('title','News from the Fitz')

@section('content')
  @foreach($news['data'] as $project)
    <h2>{{ $project['article_title'] }}</h2>

    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
      <h3>{{  Carbon\Carbon::parse($project['publication_date'])->format('l dS F Y') }}</h3>

    @markdown($project['article_body'])
    </div>
  @endforeach
@endsection
