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
    <body class="doc-body bg-grey c_darkmode">
        @include('googletagmanager::body')

        @include('includes.structure.accessibility')

        @include('includes.structure.nav')

        @if(Request::is('about-us/terms/hockney'))
            @include('includes.structure.hockney-header')
        @else
            @include('includes.structure.head')
        @endif
        @include('includes.structure.open')

        @hasSection('timeline')
            @include('includes.css.timeline-css')
        @endif

        @hasSection('360')
            @include('includes.css.photosphere-css')
        @endif

        <div class="container-fluid  mt-3 mb-3 p-3">
            <div class="container">
                @include('includes.structure.breadcrumb')
                @yield('press-contact')
                @yield('content')

                @yield('adlib')
                @yield('timeline')
            </div>
        </div>
        @yield('audioGuide')
        @yield('collection-search')

        @yield('immunity')

        @hasSection('collection-parallax')
            @include('includes.structure.parallax')
        @endif
        @hasSection('theme-carousel')
            @yield('theme-carousel')
        @endif

        @hasSection('collection-parallax')
            @include('includes.structure.parallax')
        @endif

        @hasSection('period-carousel')
            @yield('period-carousel')
        @endif

        @hasSection('collection-parallax')
            @include('includes.structure.parallax')
        @endif

        @hasSection('context-carousel')
            @yield('context-carousel')
        @endif

        @hasSection('collection-parallax')
            @include('includes.structure.parallax')
        @endif

        @hasSection('map')
            <div class="container-fluid map-box mb-3">
                @yield('map')
            </div>
        @endif
        @yield('associated_pages')

        @hasSection('cons-areas')
            @yield('cons-areas')
        @endif

        @yield('releases')
        @yield('resources-plans')
        @yield('diy')
        @yield('publications')
        @yield('research-projects')
        @yield('exhibitions-curated')
        @yield('departments-affiliated')
        @yield('research-funders')
        @yield('presenters')

        @yield('themes')
        @yield('collections')
        @yield('departments')
        @yield('curators')
        @yield('galleries')
        @yield('360')
        @yield('youtube')
        @yield('sms')
        @yield('youtube-playlist')
        @yield('sketchfab-collection')
        @yield('sketchfab')
        @yield('audio-guide')
        @yield('pharos-pages')
        @yield('podcast-object')
        @yield('twitter')
        @yield('mlt')
        @yield('shopifyPrints')
        @yield('shopify')


        @include('includes.structure.email-signup')
        @include('includes.structure.footer')
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

        @hasSection('timeline')
            @include('includes.scripts.timeline-js')
        @endif

    </body>
</html>
