@include('includes.structure.name-spaces')
<head>

        @include('includes.structure.meta')
        <x-feed-links/>

        @include('includes.css.css')

        @mapstyles

        @include('includes.structure.manifest')
    <script>
        // Include the following lines to define the gtag() function when
        // calling this code prior to your gtag.js or Tag Manager snippet
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        // Call the default command before gtag.js or Tag Manager runs to
        // adjust how the tags operate when they run. Modify the defaults
        // per your business requirements and prior consent granted/denied, e.g.:
        gtag('consent', 'default', {
            'ad_storage': 'denied',
            'ad_user_data': 'denied',
            'ad_personalization': 'denied',
            'analytics_storage': 'denied'
        });

    </script>
        @include('googletagmanager::head')
    </head>
    <body class="doc-body c_darkmode">
        @include('googletagmanager::body')
        @include('includes.structure.accessibility')
        @include('includes.structure.nav')
        <main id="site-content">
                @php
                    $anchor_menu = array();

                    if(!empty($page['page_components'])) {
                        $components = $page['page_components'];
                    }
                    foreach($components as $component) {
                        // Each array has metadata added by directus - the following filters it to just the component data
                        foreach($component as $item) {
                            if(is_array($item)) {
                                $component = $item[0];
                            }
                        }
                        if($component && !empty($component['heading'])) {
                            $heading = $component['heading'];
                        }
                        if(!empty($heading) && !empty($component['include_in_anchor_links']) && $component['include_in_anchor_links'] === true) {
                            // label, anchor_id
                            array_push($anchor_menu, array(
                                'label' => $heading,
                                'anchor_id' => Str::slug($heading, '-')
                            ));
                        }
                    }
                @endphp
                @include('visit.components.hero')
                @include('includes.structure.breadcrumb', ['class' => 'col-md-12 shadow-sm p-3 mx-auto'])
                @include('visit.components.anchor-navigation', [
                    'anchors' => $anchor_menu
                ])
                @yield('content')
            @include('includes.structure.email-signup')
        </main>
        @include('includes.structure.footer')
        @include('includes.scripts.javascript')
    </body>
</html>
