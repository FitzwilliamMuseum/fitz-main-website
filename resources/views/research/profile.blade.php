@extends('layouts.layout')
@section('keywords', $profile['meta_keywords'] ?? '')
@section('description', $profile['meta_description'] ?? '')
@if(isset($profile['hero_image']['data']['url']))
    @section('hero_image', $profile['hero_image']['data']['url'])
    @section('hero_image_title', $profile['hero_image_alt_text'] ?? '')
@else
    @section('hero_image','https://fitz-cms-images.s3.eu-west-2.amazonaws.com/baroque.jpg')
    @section('hero_image_title', 'The baroque feasting table by Ivan Day in Feast and Fast')
@endif

@section('title')
    {{ $profile['title'] ?? '' }}
    {{ $profile['display_name'] ?? '' }}
@endsection

@section('content')

    @if(($profile['employment_status'] ?? null) === 'alumni')
        <div class="container bg-white p-3">
            <div class="alert alert-danger" role="alert">{{ $profile['display_name'] ?? '' }} no longer works for the
                Museum
            </div>
        </div>
    @endif
    @if(($profile['employment_status'] ?? null) === 'employed')
        <div class="bg-white p-3" style="min-height: 500px;">
            <div class="mb-3">
                @if(isset($profile['profile_image']['data']['thumbnails'][5]['url']))
                    <div class="p-3 ">
                        <a href="{{ route('research-profile', $profile['slug'] ?? '') }}">
                            <img src="{{ $profile['profile_image']['data']['thumbnails'][5]['url'] ?? '' }}"
                                 alt="Profile image for {{ $profile['display_name'] ?? '' }}"
                                 width="{{ $profile['profile_image']['data']['thumbnails'][5]['width'] ?? '' }}"
                                 height="{{ $profile['profile_image']['data']['thumbnails'][5]['height'] ?? '' }}"
                                 loading="lazy"
                                 class="img-fluid mx-auto d-block"
                            />
                        </a>
                    </div>
                @endif
                <h2 class="display-6 text-info ">
                    {{ $profile['job_title'] ?? '' }}
                </h2>
                {!! $profile['biography'] ?? '' !!}

                @if(!empty($profile['pronouns']))
                    <p>
                        Pronouns: {{ $profile['pronouns'] }}
                    </p>
                @endif
                @if(!empty($profile['email_address']))
                    <p>
                        Email: <a href="mailto:{{ $profile['email_address'] }}">{{ $profile['email_address'] }}</a>
                    </p>
                @endif
            </div>
        </div>
    @endif
@endsection
@if(($profile['employment_status'] ?? null) === 'employed')
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
                                <h2>Publications</h2>
                            </a>
                        </span>
                            </div>
                            <div id="collapseOne"
                                 class="panel-collapse collapse in col-md-12 shadow-sm p-3 mx-auto mb-3"
                                 role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    {!! $profile['publications'] !!}
                                </div>
                            </div>
                        </div>

                        @if(!empty($profile['professional_memberships']))
                            <div class="panel panel-default">
                                <div class="panel-heading active p-2 mb-2" role="tab" id="headingTwo">
                            <span class="panel-title">
                                <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion"
                                   href="#collapseTwo"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <h2>Professional Memberships</h2>
                                </a>
                            </span>
                                </div>
                                <div id="collapseTwo"
                                     class="panel-collapse collapse in col-md-12 shadow-sm p-3 mx-auto mb-3"
                                     role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        {!! $profile['professional_memberships'] !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!empty($profile['college_affiliated']))
                            <div class="panel panel-default">
                                <div class="panel-heading active p-2 mb-2" role="tab" id="headingThree">
                            <span class="panel-title">
                                <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion"
                                   href="#collapseThree"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <h2>Affiliations</h2>
                                </a>
                            </span>
                                </div>
                                <div id="collapseThree"
                                     class="panel-collapse collapse in col-md-12 shadow-sm p-3 mx-auto mb-3"
                                     role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <ul>
                                            <li>{{ $profile['college_affiliated'] }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(!empty($profile['orcid']) || !empty($profile['githubid']) || !empty($profile['google_scholar_id']) || !empty($profile['twitter_handle']))
                                <div class="panel panel-default">
                                    <div class="panel-heading active p-2 mb-2" role="tab" id="headingFour">
                                <span class="panel-title">
                                    <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion"
                                       href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                        <h2>Research and social profiles</h2>
                                    </a>
                                </span>
                                    </div>
                                    <div id="collapseFour"
                                         class="panel-collapse collapse in col-md-12 shadow-sm p-3 mx-auto mb-3"
                                         role="tabpanel"
                                         aria-labelledby="headingFour">
                                        <div class="panel-body">
                                            <ul>
                                                @if(!empty($profile['orcid']))
                                                    <li>
                                                        <a href="https://orcid.org/{{$profile['orcid']}}">ORCID</a>
                                                    </li>
                                                @endif

                                                @if(!empty($profile['google_scholar_id']))
                                                    <li>
                                                        <a href="https://scholar.google.com/citations?user={{ $profile['google_scholar_id']}}">Google
                                                            Scholar</a>
                                                    </li>
                                                @endif

                                                @if(!empty($profile['githubid']))
                                                    <li>
                                                        <a href="https://github.com/{{ $profile['githubid']}}">Github</a>
                                                    </li>
                                                @endif
                                                @if(!empty($profile['twitter_handle']))
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
                <h2>
                    Associated Research Projects
                </h2>
                <div class="row">
                    @foreach($profile['research_projects'] as $project)
                        @if(!empty($project['research_projects_id']))
                            <x-image-card
                                :altTag="$project['research_projects_id']['hero_image_alt_text'] ?? ''"
                                :title="$project['research_projects_id']['title'] ?? ''"
                                :image="$project['research_projects_id']['hero_image'] ?? ''"
                                :route="'research-project'"
                                :params="[($project['research_projects_id']['slug'] ?? '')]">
                            </x-image-card>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
@endif
@if(!empty($profile['departments_affiliated']))
    @section('departments-affiliated')
        <div class="container-fluid py-3">
            <div class="container">
                <h2>
                    Associated Departments
                </h2>
                <div class="row">
                    @foreach($profile['departments_affiliated'] as $department)
                        @if(!empty($department['department']))
                            <x-image-card
                                :altTag="$department['department']['hero_image_alt_text'] ?? ''"
                                :title="$department['department']['title'] ?? ''"
                                :image="$department['department']['hero_image'] ?? ''"
                                :route="'department'"
                                :params="[($department['department']['slug'] ?? '')]">
                            </x-image-card>
                        @endif
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
                <h2>
                    Associated Exhibitions
                </h2>
                <div class="row">
                    @foreach($profile['exhibitions_curated'] as $exhibition)
                        <x-image-card
                            :altTag="$exhibition['exhibition']['hero_image_alt_text'] ?? ''"
                            :title="$exhibition['exhibition']['exhibition_title'] ?? ''"
                            :image="$exhibition['exhibition']['hero_image'] ?? ''"
                            :route="'exhibition'"
                            :params="[($exhibition['exhibition']['slug'] ?? '')]">
                        </x-image-card>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
@endif

{{-- https://trello.com/c/3x305zMG/93-remove-staff-profiles-related-profiles --}}
{{-- @if(!empty($similar))
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
@endif --}}
