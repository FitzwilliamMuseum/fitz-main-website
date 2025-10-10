@extends('layouts.error')
@section('title', 'Page not found')
@section('hero_image',env('CONTENT_STORE') . "large_PD_43_1986_201701_adn21_dc1.jpeg")
@section('hero_image_title', 'Vesuvius in eruption')
@section('content')
    <div class="col-md-12 shadow-sm p-3 mx-auto mb-3 mt-3">
        <div class="row">
            <div class="container">
                <p>
                    Sorry, we cannot seem to find what you’re looking for.
                </p>
                <p>
                    Our website has been redeveloped and we are reorganising our information, so things you may want to
                    see could have been moved, archived or deleted.
                </p>
                <p>
                    If you are looking for object related information,
                    please visit the <a href="{{ route('objects') }}">collections pages</a>.
                </p>
            </div>
        </div>
    </div>

    {{-- @inject('searchController', 'App\Http\Controllers\searchController')
    @php
        $records = $searchController::injectResults(Request::path())
    @endphp
    @if(!empty($records))
        <h2>
            Suggested pages
        </h2>
        @include('includes.structure.results')
    @endif --}}
@endsection
