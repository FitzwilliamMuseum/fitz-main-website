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
</div>

  @if(!empty($records))

  @foreach($records as $result)
    <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
      <h3><a href="/{{ $result['url'][0]}}/{{ $result['slug'][0]}}">{{ $result['title'][0]}}</a></h3>
      <p>
        @if(!empty($result['description'][0]))
          {{ substr(strip_tags(htmlspecialchars_decode($result['description'][0])),0,200) }}...
        @endif
      </p>
      </div>
  @endforeach
  <nav aria-label="Page navigation">
    {{ $paginate->links() }}
  </nav>

@else
  <p>No results to display.</p>
@endif
</div>
</div>
@endsection
