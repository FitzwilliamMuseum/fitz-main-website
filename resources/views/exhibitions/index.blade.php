@extends('layouts.exhibitions')
@foreach($pages['data'] as $page)
    @section('title', $page['title'])
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])
@section('hero_image', $page['hero_image']['data']['url'])
@section('hero_image_title', $page['hero_image_alt_text'])
@endforeach

@section('current')
    <div class="container-fluid py-3 bg-gdbo">
        <div class="container">
            @if(!empty($current['data']))


                <h3>Our current exhibitions</h3>
                <div class="row">
                    @foreach($current['data'] as $current)
                        <x-exhibition-card
                            :altTag="$current['hero_image_alt_text']"
                            :title="$current['exhibition_title']"
                            :image="$current['hero_image']"
                            :route="'exhibition'"
                            :params="[$current['slug']]"
                            :startDate="$current['exhibition_start_date']"
                            :endDate="$current['exhibition_end_date']"
                            :status="'current'"
                            :ticketed="$current['ticketed']"
                            :tessitura="$current['tessitura_string']"
                            :copyright="$current['copyright_text']"></x-exhibition-card>
                    @endforeach
                </div>
            @endif
            @if(!empty($displays['data']))
                <h3 id="displays">New displays in the galleries</h3>
                <div class="row">
                    @foreach($displays['data'] as $display)
                        <x-exhibition-card
                            :altTag="$display['hero_image_alt_text']"
                            :title="$display['exhibition_title']"
                            :image="$display['hero_image']"
                            :route="'exhibition'"
                            :params="[$display['slug']]"
                            :startDate="$display['exhibition_start_date']"
                            :endDate="$display['exhibition_end_date']"
                            :status="'current'"
                            :ticketed="$display['ticketed']"
                            :tessitura="$display['tessitura_string']"
                            :copyright="$display['copyright_text']"></x-exhibition-card>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
@if(!empty($future['data'] ))
@section('future')
    <div class="container-fluid py-3 bg-grey">

        <div class="container">
            <h3>Our forthcoming exhibitions and displays</h3>
            <div class="row">
                @foreach($future['data'] as $future)

                    <x-exhibition-card
                        :altTag="$future['hero_image_alt_text']"
                        :title="$future['exhibition_title']"
                        :image="$future['hero_image']"
                        :route="'exhibition'"
                        :params="[$future['slug']]"
                        :startDate="$future['exhibition_start_date']"
                        :endDate="$future['exhibition_end_date']"
                        :status="'future'"
                        :ticketed="$future['ticketed']"
                        :tessitura="$future['tessitura_string']"
                        :copyright="$future['copyright_text']"></x-exhibition-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@endif

@section('archive')
    <div class="container-fluid py-3 bg-pastel">

        <div class="container">
            <h3>
                Archived exhibitions and displays
            </h3>
            <div class="row">
                @foreach($archive['data'] as $archived)
                    <x-exhibition-card
                        :altTag="$archived['hero_image_alt_text']"
                        :title="$archived['exhibition_title']"
                        :image="$archived['hero_image']"
                        :route="'exhibition'"
                        :params="[$archived['slug']]"
                        :startDate="$archived['exhibition_start_date']"
                        :endDate="$archived['exhibition_end_date']"
                        :status="'archived'"
                        :ticketed="$archived['ticketed']"
                        :tessitura="$archived['tessitura_string']"
                        :copyright="$archived['copyright_text']"></x-exhibition-card>
                @endforeach
            </div>
            <a class="d-block btn btn-dark" href="{{ route('archive') }}">View our exhibition archive</a>
        </div>
    </div>
@endsection
