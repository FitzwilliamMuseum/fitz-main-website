@extends('layouts.layout')
@section('title','Search results')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")
@section('meta_description', "Search results for your query" )
@section('meta_keywords', 'search,results,fitzwilliam,museum')
@section('content')
    @include('includes.elements.search-form')
    @include('includes.elements.search-results-head')

    @if(!empty($records))
        <div class="row">
            @foreach($records as $result)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        @if(str_contains($result['contentType'][0], 'instagram'))
                            @include('includes.elements.instagram-search')
                        @elseif(str_contains($result['contentType'][0], 'twitter'))
                            @include('includes.elements.twitter-search')
                        @elseif(str_contains($result['contentType'][0], 'schools'))
                            @include('includes.elements.schools-search')
                        @elseif(isset($result['searchImage']))
                            @include('includes.elements.search-results-image')
                        @else
                            @include('includes.elements.search-results-missing-image')
                        @endif
                        <div class="card-body ">
                            @include('includes.elements.search-result-title')
                            <x-search-content-type :type="$result['contentType'][0]" ></x-search-content-type>
                            @include('includes.elements.mimetype-meta')
                            @include('includes.elements.learning-files')
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

@endsection
