@include('includes.structure.name-spaces')
<head>

    @include('includes.structure.meta')
    <x-feed-links></x-feed-links>
    @include('includes.css.css')
    @include('includes.structure.manifest')
    @include('googletagmanager::head')

</head>
<body class="doc-body bg-grey c_darkmode">
@include('googletagmanager::body')
@include('includes.structure.accessibility')
@include('includes.structure.nav')
{{-- include temporary banner for the site --}}
{{-- @include('includes.structure.defaced-header') --}}

{{-- uncomment the following line once the above banner has been removed --}}
@hasSection('banner')
    @yield('banner')
@else
    @include('includes.structure.head-exhibitions')
@endif

@include('includes.structure.exhibitions-ex')

<div class="container-fluid parallax parallax-home"></div>

@include('includes.structure.galleries')

<div class="container-fluid parallax parallax-home"></div>

@yield('fundraising')

<div class="container-fluid parallax parallax-home mt-3"></div>

<div class="container mt-3">
    <h3><a href="{{  route('objects') }}">Collections highlights</a></h3>
    <div class="row">
        @yield('themes')
    </div>
</div>

<div class="container-fluid parallax parallax-home mt-3"></div>

<div class="container mt-3">
    <h3><a href="{{ route('research') }}">Our research</a></h3>
    <div class="row">
        @yield('research')
    </div>
</div>


<div class="container-fluid parallax parallax-home mt-3"></div>

<div class="container mt-3">
    <h3><a href="{{ route('news') }}">Latest news</a></h3>
    <div class="row">
        @yield('news')
    </div>
</div>

<div class="container-fluid parallax parallax-home mt-3"></div>

<div class="container-fluid bg-gdbo py-3">
    @yield('shopify')
</div>

@include('includes.structure.email-signup')
@include('includes.structure.footer')
@include('includes.scripts.javascript')

</body>
</html>
