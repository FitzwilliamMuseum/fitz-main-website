@include('includes.structure.name-spaces')
<head>

        @include('includes.structure.meta')
        <x-feed-links/>

        @include('includes.css.css')

        @mapstyles

        @include('includes.structure.manifest')
        @include('googletagmanager::head')
    </head>
    <body class="doc-body c_darkmode">
        @include('googletagmanager::body')
        @include('includes.structure.accessibility')
        @include('includes.structure.nav')
        <main id="site-content">
            @yield('title')
                @php
                    $anchor_menu = array();

                    if(!empty($page['page_components'])) {
                        $components = $page['page_components'];
                    }

                    foreach($components as $component) {
                        $component = is_array(array_values($component)[1]) ? array_values($component)[1][0] : null;
                        if($component && !empty($component['heading'])) {
                            $heading = $component['heading'];
                        }
                        if(!empty($heading) && !empty($component['include_in_anchor_links']) && $component['include_in_anchor_links']) {
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
