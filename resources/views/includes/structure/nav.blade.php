{{--

** emergency announcement modal can be uncommented if necessary
** please note that there is code in:
**
** resources/views/includes/scripts/javascript.blade.php
** resources/js/app.js
**
** which also needs uncommenting for this to work
--}}

{{--
<!-- Button trigger modal -->--}}
{{--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
    id="launchEmergencyModalButton" aria-hidden="true" tabindex="-1" style="display:none;">--}}
{{-- Launch static backdrop modal--}}
{{--</button>--}}

{{--
<!-- Modal -->--}}
{{--
<!-- Commented out as not in use, but the image is appearing in Social Media links -->--}}

{{--<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background: rgba(0, 0, 0, 0.25);">--}}
{{-- <div class="modal-dialog">--}}
{{-- <div class="modal-content">--}}
{{-- <div class="modal-header">--}}
{{-- <h5 class="modal-title" id="staticBackdropLabel">Christmas and New Year at the Fitzwilliam Museum
</h5>--}}
{{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{-- </div>--}}
{{-- <div class="modal-body">--}}

{{-- <img src="/images/logos/tree.png" alt="X-Mas 2022"
    style="float:right;max-width:200px;margin-left:20px;">--}}

{{-- <p>The Museum will be open on the following days over the festive period: </p>--}}

{{-- <ul style="margin:0 0 10px 10px;padding:0;">--}}
{{-- <li>27 December (12:00 – 17:00)</li>--}}
{{-- <li>28, 29, 30 December (10:00 – 17:00)</li>--}}
{{-- </ul>--}}

{{-- <p>Our regular opening hours will resume on Tuesday 3 January 2023</p>--}}

{{-- </div>--}}
{{-- <div class="modal-footer">--}}
{{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{--</div>--}}


<!-- Nav bars -->
{{-- If the client has a global announcement published in the CMS, then output it at the top of the page --}}
<header>
@if(
(!empty(SiteHelper::getGlobalAnnouncement()['data'][0]['status']) &&
SiteHelper::getGlobalAnnouncement()['data'][0]['status'] == 'published')
)
    <nav class="navbar  navbar-expand-lg navbar-dark bg-black fixed-top container-fluid"
        style="padding-top: 0; flex-direction: column;">
        <div id="global-announcement" class="global-announcement"
            style="background: #fff; color: black; padding: 10px; text-align: center; width: 100%;">
            <style>
                #global-announcement a {
                    color: inherit;
                    text-decoration: underline;
                }
            </style>

            {!! (SiteHelper::getGlobalAnnouncement()['data'][0]['announcement']) !!}
        </div>
        <div class="container-fluid">

            @else

                <nav id="main-nav" class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
                    <div class="container-fluid">

                        @endif

                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset("/images/logos/FitzLogo.svg") }}" alt="The Fitzwilliam Museum Logo" height="60"
                                width="66.66" class="ml-1 mr-1" loading="lazy"/>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item {{ (Request()->is('/')) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('home') }}">Home <span
                                            class="visually-hidden">(current)</span></a>
                                </li>
                                <li class="nav-item {{ (request()->is('plan-your-visit*')) ? 'active' : '' }}">
                                    {{-- <a class="nav-link" href="{{ route('visit') }}">Visit us</a> --}}
                                    <a class="nav-link" href="/plan-your-visit">Visit us</a>
                                </li>
                                <li class="nav-item {{ (Request()->is('events*')) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('events') }}">Events</a>
                                </li>
                                <li class="nav-item {{ (Request()->is('explore-our-collection*')) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('objects') }}">Collection</a>
                                </li>
                                <li class="nav-item {{ (Request()->is('learn-with-us*')) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('landing', ['learn-with-us']) }}">
                                        Learning</a>
                                </li>
                                <li class="nav-item {{ (Request()->is('about-us*')) ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('landing', ['about-us']) }}">
                                        About us</a>
                                </li>
                                <li class="nav-item {{ (Request()->is('support-us*')) ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('landing', ['support-us']) }}">
                                        Support us</a>
                                </li>
                                <li class="nav-item {{ (Request()->is('research*')) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('landing', ['research']) }}">Research</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link"
                                        href="https://curatingcambridge.co.uk/collections/the-fitzwilliam-museum">Shop</a>
                                </li>
                            </ul>
                        </div>
                        <div class="donate-container" id="search-donate-container">
                            <button id="search-btn" style="background: transparent; border: none;">
                                @svg('fas-magnifying-glass', ['aria-hidden' => 'true', 'focusable' => 'false',
                                'color' => '#fff', 'width' => 20, 'height' => 20])
                                <span class="visually-hidden">Toggle Search Box</span>
                            </button>
                            {{ Form::open(['url' => url('/search/results'),'method' => 'GET', 'id' => 'main-search', 'hidden']) }}
                                <div class="main-search-wrapper">
                                    <label class="main-search-label" for="query">Search <span>the Fitzwilliam</span></label>
                                    <div style="position: relative;">
                                        <input id="query" name="query" type="text" class="main-search-input" placeholder="What are you looking for?"
                                        required value="{{ old('query') }}" aria-label="Your query">
                                        <button class="main-search-btn" type="submit" id="searchButton" aria-label="Submit your search" style="background: transparent; border: none;">
                                            @svg('fas-magnifying-glass', ['aria-hidden' => 'true', 'focusable' => 'false',
                                            'color' => '#fff', 'width' => 20, 'height' => 20])
                                            <span class="visually-hidden">Search the Fitzwilliam</span>
                                        </button>
                                    </div>
                                </div>
                            {!! Form::close() !!}

                            <div class="nav-link-donate">
                                <a class="nav-link" href="https://tickets.museums.cam.ac.uk/donate/i/donate-to-the-fitzwilliam">Donate</a>
                            </div>
                        </div>
                    </div>
                </nav>
        </div>
    </nav>
</header>
