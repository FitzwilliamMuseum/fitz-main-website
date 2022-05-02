@extends('layouts.ttn-iiif')
@section('title', $label[0]['title'])
@section('content')
    <iframe
        src="https://data.fitzmuseum.cam.ac.uk/uv.html#?manifest={{ $label[0]['manifest_url'] }}&c=0&m=0&cv=0&config=https://data.fitzmuseum.cam.ac.uk/config.json&locales=en-GB:English (GB),cy-GB:Cymraeg,fr-FR:Français (FR),sv-SE:Svenska,xx-XX:English (GB) (xx-XX)&xywh=-3643,-330,12066,6586&r=0"
        width="100%"
        height="100%"
        allowfullscreen
        ></iframe>
@endsection

