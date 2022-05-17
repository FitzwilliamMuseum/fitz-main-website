@extends('layouts.exhibitions')
@section('keywords', 'labels,cases')
@section('description', 'Labels for the Odundo show ' . $title)
@section('title', 'Labels for ' . $title)
@section('hero_image', $labels['data'][0]['object_labels'][0]['mo_labels_id']['cover_image']['data']['url'])
@section('hero_image_title', 'An image representing this case\'s content')
@section('content')
    <div class="bg-white p-3">
        <blockquote class="blockquote">
            {!! $labels['data'][0]['object_labels'][0]['mo_labels_id']['description'] !!}
        </blockquote>
    </div>
@endsection
@section('exhibition-labels')
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                @foreach($labels['data'] as $label)
                    <x-image-card
                        :image="$label['hero_image']"
                        :altTag="$label['hero_image_alt_title']"
                        :route="'exhibition.label'"
                        :params="[$label['slug']]"
                        :title="$label['title']"></x-image-card>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid text-center">
            {{ $paginator->links('includes.structure.case-pagination')->withPath('/boom/case-')}}
    </div>
@endsection
