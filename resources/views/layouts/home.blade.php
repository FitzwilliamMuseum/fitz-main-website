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
@if (\Carbon\Carbon::now()->diffInHours('2022-02-14 09:30:00', false) <= 0)
    @include('includes.structure.hockney-header')
@else
    @include('includes.structure.head')
@endif
@include('includes.structure.open')
@include('includes.structure.exhibitions')

<div class="container-fluid parallax parallax-home"></div>

@include('includes.structure.galleries')

<div class="container-fluid parallax parallax-home"></div>

@yield('fundraising')
<div class="container-fluid parallax parallax-home mt-3">
</div>
@include('includes.structure.thingstodo')

<div class="container-fluid parallax second-parallax-home mt-3">
</div>

<div class="container mt-3">
    <h3><a href="{{  route('objects') }}">Collections highlights</a></h3>
    <div class="row">
        @yield('themes')
    </div>
</div>

<div class="container-fluid parallax second-parallax-home mt-3"></div>

<div class="container mt-3">
    <h3><a href="{{ route('research') }}">Our research</a></h3>
    <div class="row">
        @yield('research')
    </div>
</div>

<div class="container-fluid parallax second-parallax-home">
</div>

<div class="container mt-3">
    <h3><a href="{{ route('news') }}">Latest news</a></h3>
    <div class="row">
        @yield('news')
    </div>
</div>
<div class="container-fluid parallax second-parallax-home">
</div>
<div class="container-fluid bg-gdbo py-3">
    @yield('shopify')
</div>
@include('includes.structure.email-signup')
@include('includes.structure.footer')
@include('includes.scripts.javascript')

</body>
</html>
