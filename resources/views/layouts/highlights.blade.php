@include('includes.structure.name-spaces')
<head>

    @include('includes.structure.meta')

    @include('includes.css.css')

    @hasSection('map')
        @mapstyles
    @endif

    @include('includes.structure.manifest')

    @yield('jsonld')

    <x-feed-links></x-feed-links>

    @include('googletagmanager::head')

</head>
<body class="doc-body c_darkmode">
@include('googletagmanager::body')

@include('includes.structure.accessibility')

@include('includes.structure.nav')

<main>
    <span id="site-content" class="visually-hidden"></span>
    @include('includes.structure.highlight')

    <div class="container mt-3">
        @include('includes.structure.breadcrumb')
    </div>
    <span id="site-content" class="visually-hidden"></span>
    <div class="container-fluid bg-white py-3">
        <div class="container bg-white">
            @yield('press-contact')
            @yield('content')
            @yield('adlib')
        </div>
    </div>


    @hasSection('collection-parallax')
        @include('includes.structure.parallax')
    @endif

    @hasSection('map')
        <div class="container-fluid map-box mb-3">
            @yield('map')
        </div>
    @endif
    @hasSection('associated_pages')
    <div class="container-fluid bg-gbdo">
        @yield('associated_pages')
    </div>
    @endif

    @hasSection('cons-areas')
        @yield('cons-areas')
    @endif

    @yield('sketchfab-collection')
    @yield('sketchfab')
    @yield('audio-guide')

    <div class="container-fluid bg-gdbo py-3">
        @yield('pharos-pages')
        @yield('highlight')
        @yield('mlt')
    </div>
    @yield('artistsSimilar')
    @yield('shopify')

    @include('includes.structure.email-signup')
</main>


@include('includes.structure.footer')

@include('includes.structure.modal')

@hasSection('lookanswers')
    @yield('lookanswers')
@endif

@hasSection('thinkanswers')
    @yield('thinkanswers')
@endif

@hasSection('doanswers')
    @yield('doanswers')
@endif

@include('includes.scripts.javascript')

@hasSection('360')
    @include('includes.scripts.photosphere-js')
@endif

@hasSection('map')
    @mapscripts
    @include('includes.scripts.mapjs')
@endif

</body>
</html>
