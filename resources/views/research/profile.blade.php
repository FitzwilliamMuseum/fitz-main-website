@extends('layouts.layout')
@foreach($profiles['data'] as $profile)
    @section('keywords', $profile['meta_keywords'])
@section('description', $profile['meta_description'])
@if(!is_null($profile['hero_image']))
    @section('hero_image', $profile['hero_image']['data']['url'])
@section('hero_image_title', $profile['hero_image_alt_text'])
@else
    @section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/baroque.jpg')
@section('hero_image_title', 'The baroque feasting table by Ivan Day in Feast and Fast')
@endif

@section('title')
    @isset($profile['title'])
        {{$profile['title'] ?? ''}}
    @endisset
    {{ $profile['display_name'] }}
@endSection

@section('content')
    <div class="bg-white p-3" style="min-height: 500px;">
        <div class="mb-3">
            @if(!is_null($profile['profile_image']))
                <div class="p-3 ">
                    <a href="{{ route('research-profile', $profile['slug']) }}">
                        <img src="{{ $profile['profile_image']['data']['thumbnails'][5]['url']}}"
                             alt="Profile image for {{ $profile['display_name'] }}"
                             width="{{ $profile['profile_image']['data']['thumbnails'][5]['width']}}"
                             height="{{ $profile['profile_image']['data']['thumbnails'][5]['height']}}"
                             loading="lazy"
                             class="img-fluid mx-auto d-block"
                        />
                    </a>
                </div>
            @endif

            {!! $profile['biography'] !!}

            @isset($profile['job_title'])
                <p>
                    Job title: {{ $profile['job_title'] }}
                </p>
            @endisset

            @isset($profile['pronouns'])
                <p>
                    Pronouns: {{ $profile['pronouns'] }}
                </p>
            @endisset
            @isset($profile['email_address'])
                <p>
                    Email: <a href="mailto:{{ $profile['email_address'] }}">{{ $profile['email_address'] }}</a>
                </p>
            @endisset
        </div>
    </div>
@endsection

@if(!empty($profile['publications']))
    @section('publications')
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="container">
            <div class="wrapper center-block">
                <div class="panel panel-default ">
                    <div class="panel-heading active p-2 mb-2" role="tab" id="headingOne">
                        <span class="panel-title ">
                            <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapseOne"
                               aria-expanded="true" aria-controls="collapseOne">
                                <h3>Publications</h3>
                            </a>
                        </span>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in col-md-12 shadow-sm p-3 mx-auto mb-3"
                         role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            {!! $profile['publications'] !!}
                        </div>
                    </div>
                </div>

                @isset($profile['professional_memberships'])
                    <div class="panel panel-default">
                        <div class="panel-heading active p-2 mb-2" role="tab" id="headingTwo">
                            <span class="panel-title">
                                <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion"
                                   href="#collapseTwo"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <h3>Professional Memberships</h3>
                                </a>
                            </span>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in col-md-12 shadow-sm p-3 mx-auto mb-3"
                             role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                {!! $profile['professional_memberships'] !!}
                            </div>
                        </div>
                    </div>
                @endisset
                @isset($profile['college_affiliated'])
                    <div class="panel panel-default">
                        <div class="panel-heading active p-2 mb-2" role="tab" id="headingThree">
                            <span class="panel-title">
                                <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion"
                                   href="#collapseThree"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <h3>Affiliations</h3>
                                </a>
                            </span>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse in col-md-12 shadow-sm p-3 mx-auto mb-3"
                             role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <ul>
                                    <li>{{ $profile['college_affiliated'] }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endisset
                @php
                    $social = array('orcid','githubid','google_scholar_id','twitter_handle')
                @endphp
                @if(Arr::hasAny($profile, $social))
                    @if(null !== ($profile['orcid']) || null !== ($profile['githubid']) || null !== ($profile['google_scholar_id']) || null !== ($profile['twitter_handle']) )
                        <div class="panel panel-default">
                            <div class="panel-heading active p-2 mb-2" role="tab" id="headingFour">
                                <span class="panel-title">
                                    <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion"
                                       href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                        <h3>Research and social profiles</h3>
                                    </a>
                                </span>
                            </div>
                            <div id="collapseFour"
                                 class="panel-collapse collapse in col-md-12 shadow-sm p-3 mx-auto mb-3" role="tabpanel"
                                 aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <ul>
                                        @if(isset($profile['orcid']))
                                            <li>
                                                <a href="https://orcid.org/{{$profile['orcid']}}">ORCID</a>
                                            </li>
                                        @endif

                                        @if(isset($profile['google_scholar_id']))
                                            <li>
                                                <a href="https://scholar.google.com/citations?user={{ $profile['google_scholar_id']}}">Google
                                                    Scholar</a>
                                            </li>
                                        @endif

                                        @if(isset($profile['githubid']))
                                            <li>
                                                <a href="https://github.com/{{ $profile['githubid']}}">Github</a>
                                            </li>
                                        @endif
                                        @if(isset($profile['twitter_handle']))
                                            <li>
                                                <a href="https://twitter.com/{{ str_replace('@','',$profile['twitter_handle'])}}">Twitter</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endisset
            </div>
        </div>
    </div>
@endsection
@endif


@if(!empty($profile['research_projects']))
    @section('research-projects')
        <div class="container-fluid bg-gdbo py-3">
            <div class="container">
                <h3>
                    Associated Research Projects
                </h3>
                <div class="row">
                    @foreach($profile['research_projects'] as $project)
                        <x-image-card
                            :altTag="$project['research_projects_id']['hero_image_alt_text']"
                            :title="$project['research_projects_id']['title']"
                            :image="$project['research_projects_id']['hero_image']"
                            :route="'research-project'"
                            :params="[$project['research_projects_id']['slug']]">
                        </x-image-card>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
@endif

@if(!empty($profile['departments_affiliated']))
    @section('departments-affiliated')
        <div class="container-fluid bg-grey py-3">
            <div class="container">
                <h3>
                    Associated Departments
                </h3>
                <div class="row">
                    @foreach($profile['departments_affiliated'] as $department)
                        <x-image-card
                            :altTag="$department['department']['hero_image_alt_text']"
                            :title="$department['department']['title']"
                            :image="$department['department']['hero_image']"
                            :route="'department'"
                            :params="[$department['department']['slug']]">
                        </x-image-card>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
@endif

@if(!empty($profile['exhibitions_curated']))
    @section('exhibitions-curated')
        <div class="container-fluid bg-pastel p-3">
            <div class="container">
                <h3>
                    Associated Exhibitions
                </h3>
                <div class="row">
                    @foreach($profile['exhibitions_curated'] as $exhibition)
                        <x-image-card
                            :altTag="$exhibition['exhibition']['hero_image_alt_text']"
                            :title="$exhibition['exhibition']['exhibition_title']"
                            :image="$exhibition['exhibition']['hero_image']"
                            :route="'exhibition'"
                            :params="[$exhibition['exhibition']['slug']]">
                        </x-image-card>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
@endif

@endforeach

@if(!empty($similar))
    @section('mlt')
        <div class="container py-3">
            <h3>Researchers with similar profiles</h3>
            <div class="row">
                @foreach($similar as $record)
                    <x-solr-card :result="$record"></x-solr-card>
                @endforeach
            </div>
        </div>
    @endsection
@endif
