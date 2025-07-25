@php
    if(!empty($page['page_components'])) {
        $components = $page['page_components'];
    }
@endphp

@if(!empty($components))
    @foreach($components as $component)
        @if (is_array($component))
            @if(!empty($component['image']))
                @include('support.components.featured-image')
            @elseif(!empty($component['content_block']))
                @include('support.components.content-block')
            @elseif(!empty($component['banner_positioning']) && $component['banner_positioning'] == true)
                @include('support.components.banner')
            @elseif(!empty($component['related_pages_positioning']) && $component['related_pages_positioning'] == true)
                @include('support.components.grid')
            @elseif(!empty($component['accordion_component']))
                @include('support.components.faq')
            @elseif(!empty($component['cta_cards']))
                @include('support.components.payment-grid')
            @elseif(!empty($component['video']))
                @include('support.components.featured-video')
        @elseif(!empty($component['50_50_content']) && request()->is('plan-your-visit*'))
            @include('support.components.grid')
        @elseif(!empty($component['50_50_content']))
            @include('support.components.fiftyfifty')
            @elseif(!empty($component['image_gallery']))

                @include('support.components.image-gallery')

                @pushOnce('fitzwilliamScripts')
                    <script defer type="text/javascript" src="{{ asset("/js/image-gallery.js") }}"></script>
                @endPushOnce
            @elseif(!empty($component['curators_positioning']))
                @include('exhibitions.components.curators')
            @elseif(!empty($component['map_positioning']) && $component['map_positioning'] == true)
                @include('support.components.map')
            @elseif(!empty($component['floorplan_positioning']) && $component['floorplan_positioning'] == true)
                @include('support.components.floorplans')
            @elseif(!empty($component['related_events']))
                @include('exhibitions.components.related-events')
            {{-- Visit us components --}}
            @elseif(!empty($component['museum_information']))
                @include('visit.components.museum-information')
            @elseif(!empty($component['getting_here']))
                {{-- Include the fitzwilliam-map to gain access to the @section('map') for the @yield('map') in the component file --}}
                @include('includes.elements.fitzwilliam-map')
                @include('visit.components.getting-here')
            @elseif(!empty($component['accordion_section']))
                @include('visit.components.accordion-section')
            @elseif(!empty($component['quote']))
                @include('exhibitions.components.quote')
            @elseif(!empty($component['details_positioning']))
                @include('exhibitions.components.details-component')
            @elseif(!empty($component['events_positioning']))
                @include('visit.components.events-listing', [
                    'events' => $current
                ])
            @endif
        @endif
    @endforeach
@endif
