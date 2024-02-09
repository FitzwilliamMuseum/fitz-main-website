@php
    $title = $page['title'];
    if (!empty($page['hero_image'])) {
        $hero = $page['hero_image']['data']['full_url'];
    }
    if (!empty($page['page_header_heading'])) {
        $page_header_heading = $page['page_header_heading'];
    }
    if (!empty($page['page_header_subheading'])) {
        $page_header_subheading = $page['page_header_subheading'];
    }
@endphp
@if (!empty($hero))
    <div class="container-fluid head parallax hero-su-parallax" style="background: url({{ $hero }}) no-repeat center center / cover;"></div>
    <div class="breadcrumbs-su">
        @include('includes.structure.breadcrumb', ['class' => 'container container-fluid'])
    </div>
    @if (!empty($page_header_heading))
        <div class="container-fluid bg-white text-black text-center">
            <div class="hero-su mx-auto  col-max-800">
                <h1 class="shout lead" id="doc-main-h1">
                    {{ !empty($page_header_heading) ? $page_header_heading : 'Support us' }}
                </h1>
                @if (!empty($page_header_subheading))
                    <p>{{ $page_header_subheading }}</p>
                @endif
            </div>
        </div>
    @endif
@else
    <div class="breadcrumbs-su">
        @include('includes.structure.breadcrumb', ['class' => 'container container-fluid'])
    </div>

    <div class="container-fluid bg-white text-black text-center">
        <div class="hero-su mx-auto  col-max-800">
            <h1 class="shout lead" id="doc-main-h1">
                {{ !empty($page_header_heading) ? $page_header_heading : 'Support us' }}
            </h1>
            @if (!empty($page_header_subheading))
                <p>{{ $page_header_subheading }}</p>
            @endif
        </div>
    </div>
@endif
