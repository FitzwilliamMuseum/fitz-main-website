@extends('layouts.layout')
@section('title','Search results')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('meta_description', "Search results for your query" )
@section('meta_keywords', 'search,results,fitzwilliam,museum')

@section('content')
<div class="col-12 shadow-sm p-3 mx-auto mb-3">
  {{ \Form::open(['url' => url('search/results'),'method' => 'GET']) }}
  <div class="row center-block">
    <div class="col-lg-6 center-block searchform">
      <div class="input-group">
        <input type="text" id="query" name="query" value="" class="form-control mr-4"
        placeholder="Search our site" required value="{{ old('query') }}">
        <span class="input-group-btn">
          <button class="btn btn-dark" type="submit">Search...</button>
        </span>
      </div>
    </div>
  </div>
  @if(count($errors))
  <div class="form-group">
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
  @endif
  {!! Form::close() !!}
</div>
<h2 class="lead">Search results</h2>
<div class="col-12 shadow-sm p-3 mx-auto mb-3">
  <p>
    Your search for <strong>{{ $queryString }}</strong> returned <strong>{{ $number }}</strong> results.
  </p>
</div>

@if(!empty($records))
<div class="row">
@foreach($records as $result)
<div class="col-md-4 mb-3">
  <div class="card h-100">
  @if(isset($result['searchImage']))
  <div class="embed-responsive embed-responsive-1by1">
    <a href="{{ $result['url'][0]}}"><img src="{{$result['searchImage'][0]}}" class="img-fluid embed-responsive-item"  alt="Fitzwilliam Museum logo"
    loading="lazy"/></a>
  </div>
  @else
    <a href="{{ $result['url'][0]}}"><img src="https://content.fitz.ms/fitz-website/assets/portico.jpg"
  class="img-fluid responsive-item"  alt="FitzVirtual Logo" loading="lazy"/></a>
  @endif
  <div class="card-body ">
  <h3 class="lead">
    @php
    $title = strip_tags(@markdown($result['title'][0]));
    @endphp
    <a href="{{ $result['url'][0]}}">{{ $title }}</a>
  </h3>
  @if(isset($result['pubDate']))
  <h4 class="text-info lead">
    Published: {{  Carbon\Carbon::parse($result['pubDate'][0])->format('l dS F Y') }}
  </h4>
  @endif
    @if(!empty($result['body'][0]))
      @markdown(substr(strip_tags(htmlspecialchars_decode($result['body'][0])),0,200))...
    @endif

  @if(isset($result['mimetype']))
  @if(!is_null($result['mimetype'] && $result['mimetype'] == 'application\pdf'))
    <p>
      <a href="{{$result['url'][0]}}">{{$result['url'][0]}}</a>
    </p>
  @else
    <p>
      <a href="{{URL::to('/')}}/{{$result['url'][0]}}">{{URL::to('/')}}/{{$result['url'][0]}}</a>
    </p>
  @endif
  @endif
  <p>

    <span class="badge badge-wine p-2 shorten-words text-truncate">Content to expect: @contentType($result['contentType'][0])</span>
    @if(isset($result['mimetype']))
    @if(!is_null($result['mimetype'] && $result['mimetype'] == 'application\pdf'))
    <span class="badge badge-wine p-2">
      <i class="fas fa-file-pdf mr-2"></i>
      <i class="fa fa-download mr-2" aria-hidden="true"></i> @humansize($result['filesize'][0],2)
    </span>
    @endif
    @endif

    @if($result['contentType'][0] == 'learning_files')
    <span class="badge badge-wine p-2">{{ $result['learningfiletype'][0]}}</span>
    @if(isset($result['keystages']))
    <span class="badge badge-wine p-2">Key Stages this is for: {{ implode(', ', $result['keystages']) }}</span>
    @endif
    @if(isset($result['curriculum_area']))
    <span class="badge badge-wine p-2">{{ $result['curriculum_area'][0]}}</span>
    @endif
    @endif

  </p>
</div>
  </div>
</div>
@endforeach
</div>
<nav aria-label="Page navigation">
  {{ $paginate->links() }}
</nav>

@else
<div class="col-12 shadow-sm p-3 mx-auto mb-3">
  <p>No results to display.</p>
</div>
@endif
</div>
</div>
@endsection
