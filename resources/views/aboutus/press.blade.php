@extends('layouts.layout')
@section('title', 'Our press releases')
@section('hero_image', env('CONTENT_STORE') . 'cinderella_car_press.jpg')
@section('hero_image_title', 'Beggarstaffs Cinderella poster')
@section('description', 'A list of Fitzwilliam Museum press releases')
@section('keywords', 'press,release,fitzwilliam')

@section('press-contact')
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
  <p>
    Contact the press team: @fa('phone') 01223 332941 @fa('at')
    <a href="mailto:press@fitzmuseum.cam.ac.uk">press@fitzmuseum.cam.ac.uk</a>
  </p>
</div>
@endsection
@section('releases')
<div class="container">
  <div class="row">
    @foreach($press['data'] as $release)
        <x-pressCard :release="$release" />
    @endforeach
  </div>
  <nav aria-label="Page navigation">
    {{ $paginator->links() }}
  </nav>
</div>
@endsection
