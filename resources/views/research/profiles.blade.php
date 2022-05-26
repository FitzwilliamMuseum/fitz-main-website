@extends('layouts.layout')
@section('title','Researcher profiles')
@section('hero_image',env('CONTENT_STORE') . 'baroque.jpg')
@section('hero_image_title', 'The baroque feasting table by Ivan Day in Feast and Fast')
@section('description', 'A page detailing research active staff for the Fitzwilliam Museum')
@section('keywords', 'research,active,museum, archaeology, classics,history,art')

@section('content')
    <div class="row">
        @foreach($profiles->items()['data'] as $profile)
            <x-image-card
                :altTag="$profile['profile_image_alt_text']"
                :title="$profile['display_name']"
                :image="$profile['profile_image']"
                :route="'research-profile'"
                :params="[$profile['slug']]">
            </x-image-card>
        @endforeach
    </div>
    {{ $profiles->appends(request()->except('page'))->links() }}

@endsection
