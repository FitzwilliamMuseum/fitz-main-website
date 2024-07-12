@php
    $reposition_curators = false;
    if(!empty($exhibition['page_components'])) {
        $page_components = $exhibition['page_components'];
        foreach($page_components as $component) {
            if(!empty($component['curators_positioning'])) {
                $reposition_curators = true;
            }
        }
    }
@endphp

<x-exhibition-hero :hero="$hero"></x-exhibition-hero>
<div class="breadcrumbs-su">
    @include('includes.structure.breadcrumb', ['class' => 'container container-fluid'])
</div>
<x-exhibition-cta :exhibition="$exhibition"></x-exhibition-cta>

@include('support.components.components-repeater', ['page' => $exhibition])
{{-- {{ dd($exhibition) }} --}}

@if (!empty($exhibition['exhibition_files']))
    @include('includes.elements.exhibitions.files')
@endif

@if($reposition_curators == false && (!empty($exhibition['associated_curators']) || !empty($exhibition['external_curators'])))
    @include('exhibitions.components.curators')
@endif

@if(!empty($exhibition['pages_listing']))
    @include('support.components.related', ['page' => $exhibition])
@endif
