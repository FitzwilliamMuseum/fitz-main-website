@php
    $title = $page['title'];

    $page_header_heading = $page['page_header_heading'];
    $page_header_subheading = $page['page_header_subheading'];

    $page_intro_title = $page['page_intro_title'];
    $page_intro_subtitle = $page['page_intro_subtitle'];

    $centered_heading = $page['centered_heading'];
    $centered_body = $page['centered_body'];

    $banner_heading = $page['banner_heading'];
    $banner_subheading = $page['banner_subheading'];

    $fiftyfifty_content = $page['50_50_content'];

    $faq_heading = $page['faq_section_heading'];
    $faq_accordion = $page['accordion'];

    $suggested_pages_heading = $page['suggested_pages_heading'];
    $suggested_page_listing = $page['page_listing'];

    $relevant_page_listing = $page['relevant_page_listing'];
@endphp
@if (isset($hero) && $hero == true)
    <div class="container-fluid head parallax hero-su-parallax"></div>
    <div class="breadcrumbs-su">
        @include('includes.structure.breadcrumb', ['class' => 'container container-fluid'])
    </div>
    @if (isset($page_header_heading))
    <div class="container-fluid bg-white text-black text-center">
        <div class="hero-su mx-auto  col-max-800">
            <h1 class="shout lead" id="doc-main-h1">{{ isset($page_header_heading) ? $page_header_heading : "Support us" }}</h1>
            <p>{{ $page_header_subheading}}</p>
            {{-- <p>If you've purchased a Membership voucher in our shops or been given a Gift Membership, see how to activate it here:</p> --}}
        </div>

        <div class="hero-su-secondary mx-auto col-max-800">
            <h2>{{ $page_intro_title }}</h2>
            <p>{{ $page_intro_subtitle }}</p>
        </div>
    </div>
    @endif
@else
    <div class="breadcrumbs-su">
        @include('includes.structure.breadcrumb', ['class' => 'container container-fluid'])
    </div>

    <div class="container-fluid bg-white text-black text-center">
        <div class="hero-su mx-auto  col-max-800">
            <h1 class="shout lead" id="doc-main-h1">{{ isset($page_header_heading) ? $page_header_heading : "Support us" }}</h1>
            @if (isset($page_header_subheading))
                <p>{{ $page_header_subheading }}</p>
            @endif
        </div>
    </div>
@endif
