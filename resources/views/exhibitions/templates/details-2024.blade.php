<x-exhibition-hero :hero="$hero"></x-exhibition-hero>

<x-exhibition-cta :exhibition="$exhibition"></x-exhibition-cta>

@include('support.components.components-repeater', ['page' => $exhibition])

{{-- {{ dd($exhibition) }} --}}

@if(!empty($exhibition['pages_listing']))
    @include('support.components.related', ['page' => $exhibition])
@endif


