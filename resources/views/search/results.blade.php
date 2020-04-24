@extends('layouts.layout')
@section('title','Search results')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('content')
<h2>Search results</h2>
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
  <p>
    Your search for <strong>{{ $queryString }}</strong> returned <strong>{{ $number }}</strong> results.
  </p>
  @if(!empty($records))
  <ul>
  @foreach($records as $result)
      <li>
        <a href="/{{ $result['url'][0]}}/{{ $result['slug'][0]}}">{{ $result['title'][0]}}</a><br />
        @if(!empty($result['description'][0]))
          {{ $result['description'][0] }}
        @endif
      </li>
  @endforeach
  </ul>
  <nav aria-label="Page navigation">
    {{ $paginate->links() }}
  </nav>
</div>
@else
  <p>No results to display.</p>
@endif
</div>
@endsection
