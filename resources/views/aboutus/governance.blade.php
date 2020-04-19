@extends('layouts/layout')
@section('title','Our Governance Documents')
@section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/millais_bridesmaid.jpg')
@section('hero_image_title','Millais\'s Bridesmaid')

@section('content')
<div class="col-12 shadow-sm p-3 mx-auto mb-3 rounded">
<?php
function human_filesize($size, $precision = 2) {
    $units = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $step = 1024;
    $i = 0;
    while (($size / $step) > 0.9) {
        $size = $size / $step;
        $i++;
    }
    return round($size, $precision).$units[$i];
}
?>

<ul>
@foreach($gov['data'] as $document)
<li><a href="{{ $document['file']['data']['full_url'] }}">{{ $document['title'] }}</a>
  {{ $document['type'] }} - {{ human_filesize($document['file']['filesize'])}}</li>
@endforeach
</ul>
</div>
@endsection
