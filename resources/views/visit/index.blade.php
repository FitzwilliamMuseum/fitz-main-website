@php
    $reposition_events = false;
    if(!empty($exhibition['page_components'])) {
        $page_components = $exhibition['page_components'];
        foreach($page_components as $component) {
            if(!empty($component['events_positioning'])) {
                $reposition_events = true;
            }
        }
    }
@endphp
@extends('layouts.visitus')

@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/visit-final-.png')
@section('title', 'Plan your visit')
@section('description', 'Visiting the Fitzwilliam Museum? What do you need to know?')
@section('keyword', 'cambridge,museums,visit')
@php
    $all_events['data'] = array_merge($current['data'], $displays['data']);
@endphp
@section('content')
    <div class="visit-us-landing">
        @include('support.components.components-repeater', [
            'events' => $all_events
        ])
        @if($reposition_events == "false")
            @include('visit.components.events-listing', [
                'events' => $all_events
            ])
        @endif
    </div>
@endsection
