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

        @php
            $reposition_events = false;
            if(!empty($settings['page_components'])) {
                $page_components = $settings['page_components'];
                foreach($page_components as $component) {
                    if(!empty($component['events_positioning'])) {
                        $reposition_events = true;
                    }
                }
            }
            $reposition_pages = false;
            if(!empty($settings['page_components'])) {
                $page_components = $settings['page_components'];
                foreach($page_components as $component) {
                    if(!empty($component['related_pages_positioning'])) {
                        $reposition_pages = true;
                    }
                }
            }

            $pages_listing = $settings['related_pages'];
            
            $pages_listing_order = [];
            if (!empty($settings['related_pages_order'])) {
                $custom_order = true;
                if (!empty($pages_listing)) {
                    // TODO: Would also be worth moving this into its own function
                    foreach ($settings['related_pages_order'] as $page_order) {
                        foreach ($pages_listing as $page_item) {
                            if ($page_order['page_id'] == $page_item['subpages_id']['id']) {
                                $page_item['card_heading'] = $page_order['page_heading'];
                                array_push($pages_listing_order, $page_item);
                            }
                        }
                    }
                }
            }
        @endphp
        @if(request()->get('template') && request()->get('template') == 'new')
        {{-- NEW TEMPLATE --}}
            @include('home.components.hero')
            @if(!empty($settings['page_components']))
                @include('support.components.components-repeater', [
                    'components' => $settings['page_components']
                ])
            @endif
            @if($reposition_pages == false)
                @include('support.components.grid', [
                    'pages_listing_order' => $pages_listing_order,
                    'is_component' => false
                ])
            @endif
        @else
        {{-- OLD TEMPLATE --}}
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
        @endif
        @include('includes.structure.email-signup')
    </main>
    @include('includes.structure.footer')
    @include('includes.scripts.javascript')

</body>

</html>
