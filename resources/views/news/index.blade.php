@extends('layouts/layout')

@section('title','News from the Fitz')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('content')
<div class="row">
  @foreach($news['data'] as $project)
  <div class="col-md-6 mb-3">
    <div class="card card-body h-100">
      @if(!is_null($project['field_image']))
      <img class="img-fluid" src="{{ $project['field_image']['data']['thumbnails'][4]['url']}}"/>
        @endif
    <div class="container h-100">

      <div class="contents-label mb-3">
        <h3>
          <a href="news/article/{{ $project['slug']}}">{{ $project['article_title']}}</a>
        </h3>
        {!! Str::limit($project['article_body'],200, ' (...)') !!}

      </div>
    </div>
    <a href="news/article/{{ $project['slug']}}" class="btn btn-dark">Read more</a>
  </div>

</div>
@endforeach

</div>
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">
  <li class="page-item disabled">
    <a class="page-link" href="#" tabindex="-1">Previous</a>
  </li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item">
    <a class="page-link" href="#">Next</a>
  </li>
</ul>
</nav>
@endsection
