@extends('layouts.exhibitions')
@foreach($pages['data'] as $page)
    @section('title', $page['title'])
    @section('description', $page['meta_description'])
    @section('keywords', $page['meta_keywords'])
    @section('hero_image', $page['hero_image']['data']['url'])
    @section('hero_image_title', $page['hero_image_alt_text'])
@endforeach
{{-- @section('banner')
    <x-home-page-banner :banners="$banners"></x-home-page-banner>
@endSection --}}

@php
    $text_components = array(
        'first' => array(
            'heading' => 'About the exhibition',
            'copy' => '<p>Artists Jim Goldberg, Tracey Emin and Paula Rego are among those whose work challenges the typical ideas of ‘happy’ and ‘unhappy’ families, instead revealing how families are a product of relationships between family members and the environments they live in. Cathy Wilkes, Hardeep Pandhal and others look at how each family leaves its imprint on the next generation – through biological, social and cultural </p>'
        ),
        'second' => array(
            'heading' => 'Example heading',
            'copy' => '<p>Explore our latest What’s New display, packed with a selection of supersized works which have joined our collection of prints and drawings over the last five years.</p>
            <p>Showcasing various painting, printmaking and drawing techniques from the 1600s to today, our fascinating new display brings together large-scale works on paper that reveal the artists’ creativity and the media’s versatility.</p>
            <p>Discover the contrasts and crossovers between images which are realistic and abstract, urban and rural, organic and human-made, old and new. What’s New XXL features works by historic printmakers William Hogarth and Wenceslaus Hollar alongside British modern artists such as Lucian Freud and Howard Hodgkin, and leading contemporary artists Lubaina Himid and Grayson Perry.</p>'
        ),
        'third' => array(
            'heading' => 'Meet the Artist',
            'copy' => '<p>Explore our latest What’s New display, packed with a selection of supersized works which have</p>'
        )
    );

    $accordion_section = array(
        'accordion_component' => array(
            ['accordion_heading' => 'FAQ',
            'accordion' => array(
                '1' => array(
                    'heading' => 'How accessible is the exhibition',
                    'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta eius sint facilis? Minima aperiam illo libero optio error impedit deserunt debitis ut, nihil laudantium fugiat perferendis repellendus molestiae suscipit neque!</p>'
                ),
                '2' => array(
                    'heading' => 'Can my money go to a specific collection',
                    'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta eius sint facilis? Minima aperiam illo libero optio error impedit deserunt debitis ut, nihil laudantium fugiat perferendis repellendus molestiae suscipit neque!</p>'
                ),
                '3' => array(
                    'heading' => 'Is it suitable for children?',
                    'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta eius sint facilis? Minima aperiam illo libero optio error impedit deserunt debitis ut, nihil laudantium fugiat perferendis repellendus molestiae suscipit neque!</p>'
                ),
            )]
        )
    );
    $related_events = array(
        'heading' => 'Related events',
        'events_listing' => array(
            '1' => array(
                'heading' => 'Unlock your imagination as we creatively',
                'excerpt' => 'Unlock your imagination as we creatively explore the spiritual and the divine in a printmaking workshop led by artist Alison Hunte.
                Alison Hunte is a printmaker and painter living in Cambridge. Her work explores how various states of consciousness and emotions can be expressed through art making.',
                'link_text' => 'Example link',
                'link_url' => '/'
            ),
            '2' => array(
                'heading' => 'Unlock your imagination as we creatively',
                'excerpt' => 'Unlock your imagination as we creatively explore the spiritual and the divine in a printmaking workshop led by artist Alison Hunte.
                Alison Hunte is a printmaker and painter living in Cambridge. Her work explores how various states of consciousness and emotions can be expressed through art making.',
                'link_text' => 'Example link',
                'link_url' => '/'
            )
        )
    );
    $image_gallery = array(
        'section_heading' => 'Take a look at the exhibition',
        'gallery_images' => array(
            '1' => array(
                'data' => array(
                    'full_url' => 'https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg'
                ),
                'image_caption' => 'West Africa, the Caribbean, South America and Europe, this landmark exhibition also reveals the histories that have been silenced'
            ),
            '2' => array(
                'data' => array(
                    'full_url' => 'https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg'
                ),
                'image_caption' => 'West Africa, the Caribbean, South America and Europe, this landmark exhibition also reveals the histories that have been silenced'
            ),
            '3' => array(
                'data' => array(
                    'full_url' => 'https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg'
                ),
                'image_caption' => 'West Africa, the Caribbean, South America and Europe, this landmark exhibition also reveals the histories that have been silenced'
            ),
        )
    )
@endphp

@if(request()->get('template') && request()->get('template') == 'new')
    @section('exhibitions-landing-2025')
        @include('exhibitions.components.hero')
        <div class="single-exhibition">
            @include('exhibitions.components.text-component', $content = $text_components['first'])
            @include('exhibitions.components.details-component')
            @include('exhibitions.components.text-component', $content = $text_components['second'])
            @include('exhibitions.components.text-component', $content = $text_components['third'])
            <div class="container mx-auto col-max-800">
                @include('support.components.featured-video', [
                    'youtube_id' => '7fIaWBNFPkc'
                ] )
            </div>
            @include('support.components.image-gallery', [
                'component' => array(
                    'image_gallery' => [$image_gallery]
                )
            ])
            @pushOnce('fitzwilliamScripts')
                <script defer type="text/javascript" src="{{ asset("/js/image-gallery.js") }}"></script>
            @endPushOnce
            @include('exhibitions.components.quote')
            <div class="container mx-auto col-max-800">
                @include('support.components.featured-image', [
                    'caption' => 'West Africa, the Caribbean, South America and Europe, this landmark exhibition also reveals the histories that have been silenced'
                ])
            </div>
            @include('support.components.faq', [
                'component' => $accordion_section
            ] )
            @include('exhibitions.components.related-events', [
                'related_events' => $related_events
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
            </div>
    @endSection
@endif


@section('current')
    <div class="container-fluid py-3">
        <div class="container">
            @if(!empty($current['data']) || !empty($displays['data']))
                <h2 class="mb-3">Current exhibitions and displays</h2>
                <div class="row">
                    @if(!empty($current['data']))
                        @foreach($current['data'] as $current)
                            <x-exhibition-card
                                :headingLevel="3"
                                :altTag="$current['hero_image_alt_text']"
                                :title="$current['exhibition_title']"
                                :image="$current['hero_image']"
                                :route="'exhibition'"
                                :params="[$current['slug']]"
                                :startDate="$current['exhibition_start_date']"
                                :endDate="$current['exhibition_end_date']"
                                :displayEndDate="$current['display_end_date']"
                                :status="'current'"
                                :ticketed="$current['ticketed']"
                                :tessitura="$current['tessitura_string']"
                                :copyright="$current['copyright_text']"></x-exhibition-card>
                        @endforeach
                    @endif

                    @if(!empty($displays['data']))
                        @foreach($displays['data'] as $display)
                            <x-exhibition-card
                                :headingLevel="3"
                                :altTag="$display['hero_image_alt_text']"
                                :title="$display['exhibition_title']"
                                :image="$display['hero_image']"
                                :route="'exhibition'"
                                :params="[$display['slug']]"
                                :startDate="$display['exhibition_start_date']"
                                :endDate="$display['exhibition_end_date']"
                                :displayEndDate="$display['display_end_date']"
                                :status="'current'"
                                :ticketed="$display['ticketed']"
                                :tessitura="$display['tessitura_string']"
                                :copyright="$display['copyright_text']"></x-exhibition-card>
                        @endforeach
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection

@if(!empty($future['data'] ))
    @section('future')
        <div class="container-fluid py-3">

            <div class="container">
                <h2 class="mb-3">Upcoming exhibitions and displays</h2>
                <div class="row">
                    @foreach($future['data'] as $future)

                        <x-exhibition-card
                            :headingLevel="3"
                            :altTag="$future['hero_image_alt_text']"
                            :title="$future['exhibition_title']"
                            :image="$future['hero_image']"
                            :route="'exhibition'"
                            :params="[$future['slug']]"
                            :startDate="$future['exhibition_start_date']"
                            :endDate="$future['exhibition_end_date']"
                            :displayEndDate="$future['display_end_date']"
                            :status="'future'"
                            :ticketed="$future['ticketed']"
                            :tessitura="$future['tessitura_string']"
                            :copyright="$future['copyright_text']"></x-exhibition-card>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
@endif

@section('archive')
    <div class="container-fluid py-3">

        <div class="container">
            <h2 class="mb-3">Archived exhibitions and displays</h2>
            <div class="row">
                @foreach($archive['data'] as $archived)
                    <x-exhibition-card
                        :altTag="$archived['hero_image_alt_text']"
                        :headingLevel="3"
                        :title="$archived['exhibition_title']"
                        :image="$archived['hero_image']"
                        :route="'exhibition'"
                        :params="[$archived['slug']]"
                        :startDate="$archived['exhibition_start_date']"
                        :endDate="$archived['exhibition_end_date']"
                        :displayEndDate="$archived['display_end_date']"
                        :status="'archived'"
                        :ticketed="$archived['ticketed']"
                        :tessitura="$archived['tessitura_string']"
                        :copyright="$archived['copyright_text']"></x-exhibition-card>
                @endforeach
            </div>
            <a class="btn btn-dark" href="{{ route('archive') }}">View our exhibition archive</a>
        </div>
    </div>
@endsection
