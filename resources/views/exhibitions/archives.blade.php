@extends('layouts.exhibitions')

@section('title', 'Past exhibitions and displays')
@section('description', 'An archived overview of exhibitions and displays')
@section('keywords', 'exhibition,archive,displays')
@section('hero_image', env('CONTENT_STORE') . 'img_20190105_153947.jpg')
@section('hero_image_title', "The inside of our Founder's entrance")

@section('archive')
<div class="container-fluid py-3">
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
        :ticketed="$archived['ticketed']"></x-exhibition-card>
      @endforeach
    </div>
  </div>
</div>
@endsection
