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
    $reposition_details = false;
    if(!empty($exhibition['page_components'])) {
        $page_components = $exhibition['page_components'];
        foreach($page_components as $component) {
            if(!empty($component['details_positioning'])) {
                $reposition_details = true;
            }
        }
    }
@endphp
<main>
<div class="sticky-spacer"></div>
<div class="breadcrumbs-su">
    @include('includes.structure.breadcrumb', ['class' => 'container container-fluid'])
</div>
@include('exhibitions.components.hero')
@if($reposition_details == false && (!empty($exhibition['exhibition_time_information']) || !empty($exhibition['exhibition_time_information'])))
    @include('exhibitions.components.details-component')
@endif
@include('support.components.components-repeater', ['page' => $exhibition])

@if(!empty($exhibition['pages_listing']))
    @include('support.components.related', ['page' => $exhibition])
@endif