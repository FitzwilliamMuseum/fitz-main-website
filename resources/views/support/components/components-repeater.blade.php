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
            @elseif(!empty($component['banner']))
                @include('home.components.banner')
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
        @elseif(!empty($component['50_50_section']))
            <div class="{{ request()->is('/') ? 'fifty-fifty-section' : 'container fifty-fifty-section' }}">
                {{-- @dd($component['50_50_section'][0]) --}}
                @include('support.components.fiftyfifty', [
                    'fiftyfifty_content' => $component['50_50_section'][0]['50_50_content']
                ])
                @if(!empty($component['50_50_section'][0]['section_link']))
                    @php
                        $section_link = !empty($component['50_50_section'][0]['section_link']) ? $component['50_50_section'][0]['section_link'][0] : null;
                    @endphp
                    @if(!empty($section_link))
                        <div class="fifty-fifty-section__footer">
                            <a class="{{ $section_link['link_style'] == 'button' ? 'button--block button--white' : '' }}" href="{{ $section_link['link_url'] }}">{{ $section_link['link_text'] }}</a>
                        </div>
                    @endif
                @endif
            </div>
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
            @elseif(!empty($component['soundcloud_embed']))
                @include('exhibitions.components.soundcloud-embed')
            @elseif(!empty($component['listing_section']))
                @include('visit.components.events-listing')
            @endif
        @endif
    @endforeach
@endif
