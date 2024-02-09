<x-exhibition-hero :hero="$hero"></x-exhibition-hero>

<x-exhibition-cta></x-exhibition-cta>

@include('support.components.components-repeater', ['page' => $exhibition])

@include('includes.structure.nav')

@include('includes.structure.email-signup')

@include('includes.structure.footer')

@include('includes.scripts.javascript')


