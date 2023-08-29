@extends('layouts.layout')
@section('title', 'Explore our collection')
@section('hero_image',env('CONTENT_STORE') . 'large_PD_8_1979_1_201709.jpg')
@section('hero_image_title', 'The Death of Hippolytus')
@section('description','A search page for our highlight objects')
@section('keywords', 'search,highlights, objects')
@section('collection-parallax', env('CONTENT_STORE') . 'large_PD_8_1979_1_201709.jpg')
@include('includes.structure.collections-search-form')
@include('includes.structure.theme-carousel')
@include('includes.structure.period-carousel')
@include('includes.structure.context-carousel')
@include('includes.structure.developer')






