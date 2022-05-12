@extends('layouts.layout')
@section('title','Our Governance Documents')
@section('hero_image', env('CONTENT_STORE') . 'millais_bridesmaid.jpg')
@section('hero_image_title','Millais\'s Bridesmaid')
@section('description', 'A list of governance files for the Fitzwilliam Museum')
@section('keywords', 'fitzwilliam,museum,governance,pdf')
@section('content')

    <h3>Mission</h3>
    <div class="row">
        @foreach($mission['data'] as $document)
            <x-governance-card
                :file="$document['file']"
                :type="$document['type']"
                :image="$document['hero_image']"
                :altTag="$document['hero_image_alt_text']"
                :title="$document['title']"
            />
        @endforeach
    </div>

    <h3>Policies</h3>
    <div class="row">
        @foreach($policy['data'] as $document)
            <x-governance-card
                :file="$document['file']"
                :type="$document['type']"
                :image="$document['hero_image']"
                :altTag="$document['hero_image_alt_text']"
                :title="$document['title']"
            />
        @endforeach
    </div>

    <h3>Strategies</h3>
    <div class="row">
        @foreach($strategy['data'] as $document)
            <x-governance-card
                :file="$document['file']"
                :type="$document['type']"
                :image="$document['hero_image']"
                :altTag="$document['hero_image_alt_text']"
                :title="$document['title']"
            />
        @endforeach
    </div>

    <h3>Reviews</h3>
    <div class="row">
        @foreach($review['data'] as $document)
            <x-governance-card
                :file="$document['file']"
                :type="$document['type']"
                :image="$document['hero_image']"
                :altTag="$document['hero_image_alt_text']"
                :title="$document['title']"
            />
        @endforeach
    </div>

    <h3>Reports</h3>
    <div class="row">
        @foreach($report['data'] as $document)
            <x-governance-card
                :file="$document['file']"
                :type="$document['type']"
                :image="$document['hero_image']"
                :altTag="$document['hero_image_alt_text']"
                :title="$document['title']"
            />
        @endforeach
    </div>
    <h3>Research policies and strategy</h3>
    <div class="row">
        @foreach($research['data'] as $document)
            <x-governance-card
                :file="$document['file']"
                :type="$document['type']"
                :image="$document['hero_image']"
                :altTag="$document['hero_image_alt_text']"
                :title="$document['title']"
            />
        @endforeach
    </div>
    <h3>Education Reports</h3>
    <div class="row">
        @foreach($education['data'] as $document)
            <x-governance-card
                :file="$document['file']"
                :type="$document['type']"
                :image="$document['hero_image']"
                :altTag="$document['hero_image_alt_text']"
                :title="$document['title']"
            />
        @endforeach
    </div>
@endsection
