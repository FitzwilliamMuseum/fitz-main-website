@extends('layouts.exhibitions')
@section('description', 'A page listing image cases for ' . $cases['data'][0]['related_exhibition'][0]['exhibitions_id']['exhibition_title'])
@section('title', 'Exhibition cases from ' . $cases['data'][0]['related_exhibition'][0]['exhibitions_id']['exhibition_title'])
@section('hero_image', 'https://fitz-cms-images.s3.eu-west-2.amazonaws.com/2019-8034.15_odundo-pot_2.jpg')
@section('hero_image_title', '2019,8034.15 Odundo Pot 2')

@section('exhibition-labels')
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                @foreach($cases['data'] as $case)
                    <x-image-card
                        :image="$case['cover_image']"
                        :altTag="$case['title']"
                        :route="'exhibition.labels'"
                        :title="$case['title']"
                        :params="[$case['related_exhibition'][0]['exhibitions_id']['slug'],$case['slug']]"></x-image-card>
                @endforeach
            </div>
        </div>
    </div>
@endsection
