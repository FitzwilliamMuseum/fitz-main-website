@include('includes.structure.name-spaces')

<head>

    @include('includes.structure.meta')
    <x-feed-links></x-feed-links>
    @include('includes.css.css')
    @include('includes.structure.manifest')
    @include('googletagmanager::head')

</head>

<body class="doc-body c_darkmode">
    @include('googletagmanager::body')
    @include('includes.structure.accessibility')

    @include('includes.structure.nav')
    {{-- include temporary banner for the site --}}
    {{-- @include('includes.structure.defaced-header') --}}

    <main>
        <span id="site-content" class="visually-hidden"></span>
        @hasSection('homepage-hero')
            @yield('homepage-hero')
            {{-- @dd($hero['parallax_one']['data']['url']); --}}
        @endif

        @include('includes.structure.exhibitions', [
            'listing_type' => 'upcoming',
            'listing_title' => "What's on",
            'listing_source' => 'homepage',
        ])


        @if (!empty($settings['coming_soon']))
            <div class="container-fluid parallax parallax-home"></div>
            @include('includes.structure.exhibitions', [
                'listing_type' => 'future',
                'listing_title' => 'Coming soon',
                'listing_source' => 'homepage',
            ])
        @endif




        <div class="container-fluid parallax parallax-home"></div>

        <div class="container container-home-cards">
            <div class="row row-home">
                @yield('custom-third-row')
            </div>
        </div>

        <div class="container-fluid parallax parallax-home"></div>

        <div class="container container-home-cards">
            <div class="row row-home">
                @yield('custom-fourth-row')
            </div>
        </div>

        {{-- <div class="container container-home-cards">
        <h3><a href="{{ route('news') }}">Latest news</a></h3>
        <div class="row row-home">
            @yield('news')
        </div>
    </div> --}}

        {{-- <div class="container-fluid parallax parallax-home"></div> --}}

        {{-- <div class="container container-home-cards">
        <h3><a href="{{  route('objects') }}">Collections highlights</a></h3>
        <div class="row row-home">
            @yield('themes')
        </div>
    </div> --}}

        {{-- <div class="container-fluid parallax parallax-home"></div> --}}

        {{-- <div class="container container-home-cards">
        <h3><a href="{{ route('research') }}">Our research</a></h3>
        <div class="row row-home">
            @yield('research')
        </div>
    </div> --}}

        {{-- <div class="container-fluid parallax parallax-home"></div> --}}

        {{-- @yield('fundraising') --}}

        <div class="container-fluid parallax parallax-home"></div>

        {{-- <div class="container-fluid bg-gdbo py-3">
        @yield('shopify')
    </div> --}}
        @include('includes.structure.email-signup')
    </main>
    @include('includes.structure.footer')
    @include('includes.scripts.javascript')

</body>

</html>
