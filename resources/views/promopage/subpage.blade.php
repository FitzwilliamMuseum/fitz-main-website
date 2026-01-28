{{-- SEO --}}
@section('title', $page['title'])
@section('description', $page['meta_description'])
@section('keywords', $page['meta_keywords'])

@include('includes.structure.name-spaces')

@php
    $anchor_menu = array();

    if (!empty($page['page_components'])) {
        foreach ($page['page_components'] as $component) {
            if (!empty($component['banner_positioning']) && $component['banner_positioning'] == true) {
                $banner_pos = true;
            }

            // Create anchor links
            foreach($component as $item) {
                if(is_array($item)) {
                    if(count($item) > 1) {
                        foreach($item as $node) {
                            if($node['anchor_heading']) {
                                array_push($anchor_menu, array(
                                    'label' => $node['anchor_heading'],
                                    'anchor_id' => Str::slug($node['anchor_heading'], '-')
                                ));
                            }
                        }
                    } else {
                        $component = $item[0];
                        
                        if(isset($component['anchor_heading'])) {
                            array_push($anchor_menu, array(
                                'label' => $component['anchor_heading'],
                                'anchor_id' => Str::slug($component['anchor_heading'], '-')
                            ));
                        }
                    }
                }
            }
            // Each array has metadata added by directus - the following filters it to just the component data
            // foreach($component as $item) {
            //     if(is_array($item)) {
            //         $component = $item[0];
            //     }
            // }
            // if($component && !empty($component['anchor_heading'])) {
            //     $anchor_heading = $component['anchor_heading'];
            // }
            // if(!empty($anchor_heading)) {
            //     // label, anchor_id
            //     array_push($anchor_menu, array(
            //         'label' => $anchor_heading,
            //         'anchor_id' => Str::slug($anchor_heading, '-')
            //     ));
            // }
        }
    }

@endphp

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

<body class="doc-body support promo-page cc--darkmode">
    <main id="site-content">
    @include('googletagmanager::body')

    @include('includes.structure.accessibility')

    @include('includes.structure.nav')

    {{-- <h1>This is the subpage</h1> --}}

    @include('support.components.head')
    
    @include('visit.components.anchor-navigation', [
        'anchors' => $anchor_menu
    ])

    @include('support.components.components-repeater')

    {{-- If a custom position for the banner hasn't been specified --}}
    @if (empty($banner_pos))
        @include('support.components.banner')
    @endif

    @include('support.components.related')

    @include('includes.structure.email-signup')

    @include('includes.structure.footer')

    @include('includes.scripts.javascript')
</main>
</body>

</html>
