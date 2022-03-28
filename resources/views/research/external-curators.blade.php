@extends('layouts.layout')
@section('title','External curators')
@section('hero_image',env('CONTENT_STORE') . 'baroque.jpg')
@section('hero_image_title', 'The baroque feasting table by Ivan Day in Feast and Fast')
@section('description', 'A page detailing external curators who collaborate with the Fitzwilliam Museum')
@section('keywords', 'research,active,museum, archaeology, classics,history,art')

@section('content')
    <div class="row">
        @foreach($curators['data'] as $curator)
            <x-image-card
                :altTag="$curator['display_name']"
                :title="$curator['display_name']"
                :image="$curator['profile_image']"
                :route="'exhibition-externals'"
                :params="[$curator['slug']]"></x-image-card>
        @endforeach
    </div>
    @if($curators->count() > 12)
    <div class="container mt-1 p-2 text-center">
        <nav aria-label="Page navigation" >
            {{ $curators->appends(request()->except('page'))->links() }}
        </nav>
    </div>
    @endif
@endsection
