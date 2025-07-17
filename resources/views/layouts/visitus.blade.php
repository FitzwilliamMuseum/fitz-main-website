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
            @if(request()->get('template') && request()->get('template') == 'new')
                @php
                    $fiftyfifty = array(
                        '1' => array(
                            'card_link' => '/',
                            'heading' => 'Young Persons Ticketing Scheme',
                            'body' => 'Occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                        ),
                        '2' => array(
                            'card_link' => '/',
                            'heading' => 'Pay What You Can Sundays',
                            'body' => 'Occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                        )
                    );
                    $accordion_section_one = array(
                        'heading' => 'Access',
                        'is_anchor' => true,
                        'slug' => 'access',
                        'subheading' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                        'accordion' => array(
                            '1' => array(
                                'heading' => 'Access into and around the Museum',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '2' => array(
                                'heading' => 'Floorplans',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '3' => array(
                                'heading' => 'Toilets',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '4' => array(
                                'heading' => 'Cloakrooms',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '5' => array(
                                'heading' => 'Lifts',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '6' => array(
                                'heading' => 'Wheelchairs',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '7' => array(
                                'heading' => 'Large-Print Labels',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '8' => array(
                                'heading' => 'Assistance dogs',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                        ),
                        'addendum' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip',
                        'footer_link' => array(
                            'link_text' => 'Example',
                            'link_url' => '/',
                            'link_style' => 'button'
                        )
                    );

                    $accordion_section_two = array(
                        'heading' => 'Families',
                        'is_anchor' => true,
                        'slug' => 'families',
                        'accordion' => array(
                            '1' => array(
                                'heading' => 'Things to do',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '2' => array(
                                'heading' => 'Ideas for your visit',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.',
                                'links' => array(
                                    '1' => array(
                                        'link_text' => 'Example',
                                        'link_url' => '/',
                                        'link_style' => 'button'
                                    )
                                )
                            ),
                            '3' => array(
                                'heading' => 'Eating',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '4' => array(
                                'heading' => 'Baby feeding',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '5' => array(
                                'heading' => 'Baby Changing',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '6' => array(
                                'heading' => 'Bags and pushchairs',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                        ),
                        'footer_link' => array(
                            'link_text' => 'Example link',
                            'link_url' => '/',
                            'link_style' => 'default'
                        )
                    );

                    $banner = array(
                        'banner_heading' => 'The impact of philanthropy',
                        'banner_subheading' => 'New features artworks by contemporary artists such as Hurvin Anderson',
                        'banner_cta_text' => 'Activate',
                        'banner_cta_link' => '/'
                    );

                    $accordion_section_three = array(
                        'heading' => 'Groups',
                        'is_anchor' => true,
                        'slug' => 'groups',
                        'accordion' => array(
                            '1' => array(
                                'heading' => 'Booking',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '2' => array(
                                'heading' => 'Guided group tours',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '3' => array(
                                'heading' => 'Schools, HEI and University groups',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '4' => array(
                                'heading' => 'Tour operators, language/summer schools and commercial groups',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                        ),
                    );

                    $accordion_section_four = array(
                        'heading' => 'Shopping and eating',
                        'is_anchor' => true,
                        'slug' => 'shopping-eating',
                        'accordion' => array(
                            '1' => array(
                                'heading' => 'Courtyard Kitchen',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '2' => array(
                                'heading' => 'Kiosk',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '3' => array(
                                'heading' => 'Courtyard Shop',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '4' => array(
                                'heading' => 'Schools Lunchroom',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                        ),
                    );

                    $accordion_section_five = array(
                        'heading' => 'Visiting Guidelines',
                        'is_anchor' => true,
                        'slug' => 'guidelines',
                        'accordion' => array(
                            '1' => array(
                                'heading' => 'Photography and Video',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            ),
                            '2' => array(
                                'heading' => 'Things to know',
                                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam non ullam qui expedita eveniet magni nulla obcaecati, tempora vero delectus deserunt possimus mollitia at laboriosam odit! Labore animi dolorem ea.'
                            )
                        ),
                    );
                    $anchor_menu = array(
                        'anchors' => array(
                            '1' => array(
                                'label' => 'Getting here',
                                'anchor_id' => 'getting-here'
                            ),
                            '2' => array(
                                'label' => 'Access',
                                'anchor_id' => 'access'
                            ),
                            '3' => array(
                                'label' => 'Shopping and eating',
                                'anchor_id' => 'shopping-eating'
                            ),
                            '4' => array(
                                'label' => 'Families',
                                'anchor_id' => 'families'
                            ),
                            '5' => array(
                                'label' => 'Group visits',
                                'anchor_id' => 'groups'
                            ),
                            '6' => array(
                                'label' => 'What to see',
                                'anchor_id' => 'what-to-see'
                            )
                        )
                    );
                    $upcoming_events = array(
                        'heading' => "What's on and upcoming",
                        'events' => array(
                            '1' => array(
                                'heading' => 'Exhibition/event',
                                'optional_text' => 'Free entry',
                                'tag' => 'Display'
                            ),
                            '2' => array(
                                'heading' => 'Exhibition/event',
                                'date' => '1 April 2025 - 3 August 2025',
                                'tag' => 'Display'
                            ),
                            '3' => array(
                                'heading' => 'Exhibition/event',
                                'date' => '1 April 2025 - 3 August 2025',
                                'tag' => 'Display'
                            ),
                            '4' => array(
                                'heading' => 'Exhibition/event',
                                'date' => '1 April 2025 - 3 August 2025',
                                'tag' => 'Display'
                            ),
                            '5' => array(
                                'heading' => 'Exhibition/event',
                                'date' => '1 April 2025 - 3 August 2025',
                                'tag' => 'Display'
                            ),
                            '6' => array(
                                'heading' => 'Exhibition/event',
                                'date' => '1 April 2025 - 3 August 2025',
                                'tag' => 'Display'
                            )
                        ),
                        'footer_link' => array(
                            'link_url' => '/',
                            'link_text' => 'Example link',
                            'link_style' => 'button'
                        )
                    );
                @endphp
                @include('visit.components.hero')
                @include('visit.components.anchor-navigation', [
                    'anchors' => $anchor_menu['anchors']
                ])
                @include('visit.components.museum-information')
                @include('visit.components.events-listing', [
                    'data' => $upcoming_events
                ])
                @include('visit.components.getting-here')
                <div class="fifty-fifty--background">
                    <div class="container">
                        <h2>Example heading</h2>
                    </div>
                    @include('support.components.fiftyfifty', [
                        'component' => array(
                            '50_50_content' => $fiftyfifty
                        )
                    ])
                </div>
                @include('visit.components.accordion-section', [
                    'section' => $accordion_section_one
                ])
                @include('visit.components.accordion-section', [
                    'section' => $accordion_section_two
                ])
                @include('support.components.banner', [
                    'page' => $banner
                ])
                @include('visit.components.accordion-section', [
                    'section' => $accordion_section_three
                ])
                @include('visit.components.accordion-section', [
                    'section' => $accordion_section_four
                ])
                @include('visit.components.accordion-section', [
                    'section' => $accordion_section_five
                ])
                @include('support.components.related', [
                    'page' => array(
                        'suggested_pages_heading' => "We thought you'd like",
                        'pages_listing' => array(
                            '1' => array(
                                'page_id' => 1
                            ),
                            '2' => array(
                                'page_id' => 1
                            ),
                            '3' => array(
                                'page_id' => 1
                            )
                        )
                    )
                ])
            @else
                @include('includes.structure.head')
                @include('includes.structure.open')

                <div class="container mt-3">
                    @include('includes.structure.breadcrumb')
                </div>

                <div class="container-fluid py-3 bg-dark" id="site-content">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>

                <div class="container py-3">
                    <h3>Find us</h3>
                </div>

                <div class="container map-box ">
                    @yield('map')
                </div>

                @include('includes.elements.directions')

                <div class="container mt-2">
                    <h3 class="mb-3">Floorplans and guides</h3>
                    <div class="col-md-12 mb-2">
                        <div class="mb-3 text-center">
                            @yield('floorplans')
                        </div>
                    </div>
                </div>
                @yield('associated_pages')
            @endif
            @include('includes.structure.email-signup')
        </main>
        @include('includes.structure.footer')
        @include('includes.scripts.javascript')
    </body>
</html>
