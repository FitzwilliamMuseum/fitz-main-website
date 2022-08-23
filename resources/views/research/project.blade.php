@extends('layouts.layout')

@section('keywords', $project['meta_keywords'])
@section('description', $project['meta_description'])
@section('title', $project['title'])
@section('hero_image', $project['hero_image']['data']['url'])
@section('hero_image_title', $project['hero_image_alt_text'])
@section('content')
    <div class="col-12 shadow-sm p-3 mx-auto mb-3">
        @markdown($project['project_overview'])
    </div>
    @if(!@empty ($project['project_principal']))
        <h3>
            Project information
        </h3>
        <div class="col-12 shadow-sm p-3 mx-auto mb-3">
            <ul>
                @if($project['project_principal'])
                    <li>Principal Investigator: {{ $project['project_principal']}}</li>
                @endif
                @if($project['co_investigator'])
                    <li>Co-Investigator: {{ $project['co_investigator']}}</li>
                @endif
                @if($project['project_start_date'])
                    <li>Project start
                        date: {{ Carbon\Carbon::parse($project['project_start_date'])->format('l dS F Y') }}</li>
                @endif
                @if($project['project_end_date'])
                    <li>Project end
                        date: {{  Carbon\Carbon::parse($project['project_end_date'])->format('l dS F Y')}}</li>
                @endif
                @if($project['project_url'])
                    <li>Project website: <a href="{{ $project['project_url']}}">{{ $project['project_url']}}</a></li>
                @endif
                @if($project['award_value'])
                    <li>Funding award value: {{ $project['award_value'] }}</li>
                @endif
                @if($project['funding_reference_id'])
                    <li>Funding reference: {{ $project['funding_reference_id'] }}</li>
                @endif
            </ul>
        </div>
    @endif
    @if($project['publications'])
        <h3>Related publications</h3>
        <div class="col-12 shadow-sm p-3 mx-auto mb-3">
            @markdown($project['publications'])
        </div>
    @endif

    @if(!empty($project['project_team']))
        <h3>Project team</h3>
        <div class="col-12 shadow-sm p-3 mx-auto mb-3">
            @markdown($project['project_team'])
        </div>
    @endif
@endsection
@if(!empty($project['project_partnerships'] ))
    @section('research-funders')
        <div class="container">
            <h3>Funders and partners</h3>
            <div class="row">
                @foreach($project['project_partnerships'] as $partner)
                    <x-partner-card
                        :altTag="$partner['partner']['partner_full_name']"
                        :title="$partner['partner']['partner_full_name']"
                        :image="$partner['partner']['partner_logo']"
                        :url="$partner['partner']['partner_url']">
                    </x-partner-card>
                @endforeach
            </div>
        </div>
    @endsection
@endif

@if(isset($project['outcomes']))
    @section('research-projects')
        <div class="container">
            <h3>Outcomes of the project</h3>
            <div class="col-12 shadow-sm p-3 mx-auto mb-3">
                {!! $project['outcomes'] !!}
            </div>
        </div>
    @endsection
@endif

@if($project['youtube_id'])
    @section('youtube')
        <div class="container">
            <div class="col-12 shadow-sm p-3 mx-auto mb-3 ">
                <div class="ratio ratio-16x9">
                    <iframe title="A YouTube video related to this story"
                            src="https://www.youtube.com/embed/{{$project['youtube_id']}}"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    @endsection
@endif



@if(!empty($records))
    @section('mlt')
        <div class="container">
            <h3>Other research projects you might like</h3>
            <div class="row">
                @foreach($records as $record)
                    <x-solr-card :result="$record"></x-solr-card>
                @endforeach
            </div>
        </div>
    @endsection
@endif
