{{--

    ** emergency announcement modal can be uncommented if necessary
    ** please note that there is code in:
    **
    ** resources/views/includes/scripts/javascript.blade.php
    ** resources/js/app.js
    **
    ** which also needs uncommenting for this to work
--}}

{{--<!-- Button trigger modal -->--}}
{{--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="launchEmergencyModalButton" aria-hidden="true" tabindex="-1" style="display:none;">--}}
{{--  Launch static backdrop modal--}}
{{--</button>--}}

{{--<!-- Modal -->--}}
{{--<!-- Commented out as not in use, but the image is appearing in Social Media links -->--}}

{{--<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background: rgba(0, 0, 0, 0.25);">--}}
{{--  <div class="modal-dialog">--}}
{{--    <div class="modal-content">--}}
{{--      <div class="modal-header">--}}
{{--        <h5 class="modal-title" id="staticBackdropLabel">Christmas and New Year at the Fitzwilliam Museum</h5>--}}
{{--        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--      </div>--}}
{{--      <div class="modal-body">--}}

{{--        <img src="/images/logos/tree.png" alt="X-Mas 2022" style="float:right;max-width:200px;margin-left:20px;">--}}

{{--        <p>The Museum will be open on the following days over the festive period: </p>--}}

{{--        <ul style="margin:0 0 10px 10px;padding:0;">--}}
{{--            <li>27 December (12:00 – 17:00)</li>--}}
{{--            <li>28, 29, 30 December (10:00 – 17:00)</li>--}}
{{--        </ul>--}}

{{--        <p>Our regular opening hours will resume on Tuesday 3 January 2023</p>--}}

{{--      </div>--}}
{{--      <div class="modal-footer">--}}
{{--        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</div>--}}


<!-- Nav bars -->
{{-- If the client has a global announcement published in the CMS, then output it at the top of the page --}}
@if(
(!empty(SiteHelper::getGlobalAnnouncement()['data'][0]['status']) && SiteHelper::getGlobalAnnouncement()['data'][0]['status'] == 'published')
)
<nav class="navbar  navbar-expand-lg navbar-dark bg-black fixed-top container-fluid" style="padding-top: 0; flex-direction: column;">
    <div id="global-announcement" class="global-announcement" style="background: #fff; color: black; padding: 10px; text-align: center; width: 100%;">
        <style>
            #global-announcement a {
                color: inherit;
                text-decoration: underline;
            }
        </style>

        {!! (SiteHelper::getGlobalAnnouncement()['data'][0]['announcement']) !!}
    </div>
    <div class="container-fluid" style="padding-top: 8px;">

@else

<nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
    <div class="container-fluid">

@endif

        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{asset("/images/logos/FitzLogo.svg")}}"
                 alt="The Fitzwilliam Museum Logo"
                 height="60"
                 width="66.66"
                 class="ml-1 mr-1"
                 loading="lazy"
            />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item {{ (Request()->is('/')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home <span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item {{ (request()->is('visit-us*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('visit') }}">Visit</a>
                </li>
                <li class="nav-item {{ (Request()->is('events*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('events') }}">Events</a>
                </li>

                <li class="nav-item {{ (Request()->is('objects-and-artworks*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('objects') }}">Our Collection</a>
                </li>
                <li class="nav-item {{ (Request()->is('learning*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('landing', ['learning']) }}">
                        Learning</a>
                </li>
                <li class="nav-item {{ (Request()->is('about-us*')) ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('landing', ['about-us']) }}">
                        About</a>
                </li>
                <li class="nav-item {{ (Request()->is('support-us*')) ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('landing', ['support-us']) }}">
                        Support Us</a>
                </li>
                <li class="nav-item {{ (Request()->is('research*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('landing', ['research']) }}">Research</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link"
                       href="https://curatingcambridge.co.uk/collections/the-fitzwilliam-museum">Shop</a>
                </li>
            </ul>
            {{ Form::open(['url' => url('/search/results'),'method' => 'GET', 'class' => 'd-flex']) }}
            <label for="search" class="visually-hidden">Search: </label>
            <input id="query" name="query" type="text" class="form-control me-2"
                   placeholder="Search our site" required value="{{ old('query') }}" aria-label="Your query">
            <button type="submit" class="btn btn-outline-light my-2 my-sm-0" id="searchButton"
                    aria-label="Submit your search">Search
            </button>
            {!! Form::close() !!}
        </div>
    </div>
</nav>
