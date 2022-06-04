@extends('layouts.error')
@section('title', 'Page not found')
@section('hero_image',env('CONTENT_STORE') . "large_PD_43_1986_201701_adn21_dc1.jpeg")
@section('hero_image_title', 'Vesuvius in eruption')
@section('content')
    <div class="col-md-12 shadow-sm p-3 mx-auto mb-3 mt-3">
        <div class="row">
            <div class="col-md-4">
                <figure class="figure">
                    <img alt="An image of a very grumpy cat"
                         class="img-fluid"
                         width="416"
                         height="416"
                         src="{{ env('CONTENT_STORE') }}searle_cat.jpg?key=exhibition"
                    />
                    <figcaption class="figure-caption">
                        One of Ronald Searle's cats, given to the Fiztwilliam Museum in 2014 by his family.
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-8">
                <p>
                    Sorry, we cannot seem to find what you’re looking for, and Ronald Searle's cat is grumpy because of
                    this.
                </p>
                <p>
                    Our website has been redeveloped and we are reorganising our information, so things you may want to
                    see could have been moved, archived or deleted.
                </p>
                <p>
                    Based on the URL you used to trigger this error, we have suggested up to 3
                    pages below that may meet what you were looking for. If these are not what you
                    are looking for, please do try our search engine. If you are looking for object related information,
                    please visit the <a href="{{ route('objects') }}">collections pages</a>.
                </p>
            </div>
        </div>
    </div>

    @inject('searchController', 'App\Http\Controllers\searchController')
    @php
        $records = $searchController::injectResults(Request::path())
    @endphp
    @if(!empty($records))
        <h2>
            Suggested pages
        </h2>
        @include('includes.structure.results')
    @endif
@endsection
