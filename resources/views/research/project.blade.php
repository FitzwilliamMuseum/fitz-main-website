@extends('layouts.layout')
@foreach($projects['data'] as $project)
@section('keywords', $project['meta_keywords'])
@section('description', $project['meta_description'])
@section('title', $project['title'])
@section('hero_image', $project['hero_image']['data']['full_url'])
@section('hero_image_title', $project['hero_image_alt_text'])
  @section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
      @markdown($project['project_overview'])
      <ul>
        <li>Project website: <a href="{{ $project['project_url']}}">{{ $project['project_url']}}</a></li>
      </ul>
    </div>
  @endsection

  @section('research-funders')
  <div class="container">
    <h2>Funders and partners</h2>
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
    <ul>
    @foreach($project['project_partnerships'] as $partner)
      <li>{{ $partner['partner']['partner_full_name']}} : {{ $partner['partner']['partner_type'][0]}}</li>
    @endforeach
    </ul>
  </div>
</div>
  @endsection

  @section('research-projects')
  <div class="container">
    <h2>Outcomes of the project</h2>
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
    @markdown($project['outcomes'])
  </div>
</div>
  @endsection

@endforeach
