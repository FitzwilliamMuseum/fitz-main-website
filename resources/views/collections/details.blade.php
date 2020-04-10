@extends('layouts.layout')
@section('title', $collection['data'][0]['collection_name'])
@section('content')
<div class="row">
  <div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded intro-card">
    {!! $collection['data'][0]['collection_description'] !!}
  </div>
</div>
<?php dd($collection);?>
@endsection
