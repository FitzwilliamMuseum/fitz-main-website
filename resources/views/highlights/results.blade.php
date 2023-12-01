@extends('layouts.layout')
@section('title','Search results')
@section('hero_image',env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('description', 'Search results from our highlights')
@section('keywords', 'search,results,collection,highlights,fitzwilliam')
@section('content')

<h2>Search results</h2>
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
    <p>
        Your search for <strong>{{ $queryString }}</strong> returned <strong>{{ $number }}</strong> results.
    </p>
</div>

@if(!empty($records))
<div class="row">
    @foreach($records as $result)
    <x-solr-card :result="$result"></x-solr-card>
    @endforeach
</div>
<nav aria-label="Page navigation">
    {{ $paginate->links() }}
</nav>
@else
<div class="col-12 col-max-800 shadow-sm p-3 mx-auto mb-3">
    <p>No results to display.</p>
</div>
@endif
@endsection