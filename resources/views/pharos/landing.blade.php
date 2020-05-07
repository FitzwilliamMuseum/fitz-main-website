@extends('layouts/layout')
@section('title', 'Our objects and artworks')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/cupidpsychelarge.jpg')
@section('hero_image_title', 'Cupid and Psyche - del Sallaio')

@section('content')
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
  <h2>Searching our inventory</h2>
  <p>
    Normally, if you search our collections on this website, you are taken to
    Collections Explorer, our online public access catalogue.
  </p>
  <p>
    We have had to take Collections Explorer offline for the next two to three
    months for rebuilding.  This is due to security issues which require major
    action to be taken.
  </p>
  <p>
    When our temporary system is ready for public use, an announcement will be made here and on our main website pages.  The main website and any personal data are unaffected by this issue.
  </p>

</div>
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
  {{ \Form::open(['url' => url('objects-and-artworks/pharos/search/results'),'method' => 'GET', 'class' => 'text-center']) }}
  <div class="row center-block">
    <div class="col-lg-6 center-block searchform">
      <div class="input-group mr-3">
        <input type="text" id="query" name="query" value="" class="form-control input-lg mr-4"
        placeholder="Search our highlight objects" required value="{{ old('query') }}&contentType:pharos">
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
@endsection
