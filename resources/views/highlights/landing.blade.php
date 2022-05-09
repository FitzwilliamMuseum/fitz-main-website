@extends('layouts.layout')
@section('title', 'Our objects and artworks')
@section('hero_image',env('CONTENT_STORE') . 'large_PD_8_1979_1_201709.jpg')
@section('hero_image_title', 'Cupid and Psyche - del Sallaio')
@section('description','A search page for our highlight objects')
@section('keywords', 'search,highlights, objects')
@section('collection-parallax', 'https://api.fitz.ms/mediaLib/pdp/pdp82/P_72_1999_200706_dc2.jpg')
@section('collection-search')
    <div class="container-fluid bg-gdbo">
        <div class="container py-3 ">
            <div class="mx-auto mb-3">
                {{ $page }}
            </div>
            <div class="p-3 mx-auto mb-3 bg-white">
                {{ Form::open(['url' => url('https://data.fitzmuseum.cam.ac.uk/search/results'),'method' => 'GET']) }}
                <div class="row">
                    <div class="form-group col-md-12">
                        <input type="text" id="query" name="query" value="" class="form-control input-lg mr-4"
                               placeholder="Search our collection" required value="{{ old('query') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3>Visual results</h3>
                        <div class="form-group form-check ">
                            <input type="checkbox" class="form-check-input" id="images" name="images">
                            <label class="form-check-label" for="images">Only with images?</label>
                        </div>
                        <div class="form-group form-check ">
                            <input type="checkbox" class="form-check-input" id="iiif" name="iiif">
                            <label class="form-check-label" for="iiif">Deep zoom enabled (IIIF)?</label>
                        </div>
                    </div>
                    <div class="col">
                        <h3>Operator</h3>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="operator" id="operator" value="AND"
                                   checked>
                            <label class="form-check-label" for="operator">
                                AND
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="operator" id="operator" value="OR">
                            <label class="form-check-label" for="operator">
                                OR
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <h3>Sort by last update</h3>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sort" id="sort" value="desc" checked>
                            <label class="form-check-label" for="sort">
                                Descending
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sort" id="sort" value="asc">
                            <label class="form-check-label" for="sort">
                                Ascending
                            </label>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>
                @if(count($errors))
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                {!! Form::close() !!}
            </div>

            <h3>Search our highlights</h3>
            <div class="col-12 shadow-sm p-3 mx-auto">
                {{ Form::open(['url' => url('objects-and-artworks/highlights/search/results'),'method' => 'GET', 'class' => 'text-center']) }}
                <div class="row center-block">
                    <div class="col-lg-12 center-block searchform">
                        <div class="input-group mr-3">
                            <input type="text" id="query" name="query" value="" class="form-control input-lg mr-4"
                                   placeholder="Search our highlight objects" required
                                   value="{{ old('query') }}&contentType:pharos">
                            <span class="input-group-btn">
                <button class="btn btn-dark" type="submit">Search...</button>
              </span>
                        </div>
                    </div>
                </div>
                @if(count($errors))
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('theme-carousel')
    <section class="pt-3 pb-2">
        <div class="container-fluid bg-grey">
            <div class="row">
                <div class="col-6">
                    <h3 class="my-3">Explore Highlights by theme</h3>
                </div>
                <div class="col-12">
                    <div id="pharos" class="carousel slide"  data-bs-ride="carousel" data-bs-interval="false">
                        <div class="carousel-inner">
                            @foreach(array_chunk($pharos['data'],3,true) as $slides)
                                @if($loop->first)
                                    <x-carousel-slide
                                        :slides="$slides"
                                        :class="'active'"
                                        :imageObject="'hero_image'"
                                        :title="'title'"
                                        :route="'theme'"
                                        :param="'slug'"
                                        :slugify="'false'"
                                    />
                                @else
                                    <x-carousel-slide
                                        :slides="$slides"
                                        :class="''"
                                        :imageObject="'hero_image'"
                                        :title="'title'"
                                        :route="'theme'"
                                        :param="'slug'"
                                        :slugify="'false'"
                                    />
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#pharos" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#pharos" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('period-carousel')
    <section class="pt-5 pb-5">
        <div class="container-fluid bg-pastel">
            <div class="row">
                <div class="col-6">
                    <h3 class="my-3">Explore periods</h3>
                </div>
                <div class="col-12">
                    <div id="periods" class="carousel slide"  data-bs-ride="carousel" data-bs-interval="false">
                        <div class="carousel-inner">
                            @foreach(array_chunk($periods,3,true) as $slides)
                                @if($loop->first)
                                    <x-carousel-slide
                                        :slides="$slides"
                                        :class="'active'"
                                        :imageObject="'image'"
                                        :title="'period_assigned'"
                                        :route="'period'"
                                        :param="'period_assigned'"
                                        :slugify="'true'"
                                    />
                                @else
                                    <x-carousel-slide
                                        :slides="$slides"
                                        :class="''"
                                        :imageObject="'image'"
                                        :title="'period_assigned'"
                                        :route="'period'"
                                        :param="'period_assigned'"
                                        :slugify="true"
                                    />
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#periods" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#periods" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('context-carousel')
    <section class="pt-2 pb-2">
        <div class="container-fluid bg-gdbo">
            <div class="row">
                <div class="col-6">
                    <h3 class="my-3">Explore Contexts</h3>
                </div>

                <div class="col-12">
                    <div id="contexts" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                        <div class="carousel-inner">
                            @foreach(array_chunk($contexts,3,true) as $slides)
                                @if($loop->first)
                                    <x-carousel-slide
                                        :slides="$slides"
                                        :class="'active'"
                                        :imageObject="'hero_image'"
                                        :title="'section'"
                                        :route="'context-sections'"
                                        :param="'section'"
                                        :slugify="'false'"
                                    />
                                @else
                                    <x-carousel-slide
                                        :slides="$slides"
                                        :class="''"
                                        :imageObject="'hero_image'"
                                        :title="'section'"
                                        :route="'context-sections'"
                                        :param="'section'"
                                        :slugify="'false'"
                                    />
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#contexts" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#contexts" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


