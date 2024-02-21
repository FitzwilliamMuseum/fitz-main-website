<div class="container-fluid head parallax"></div>
<div class="container-fluid bg-white text-black text-center">
    <div class="py-2">
        @if(Request::segment(1) === "learning")
            <h1 class="shout lead learning-heading" id="doc-main-h1">@yield('title')</h1>
        @else
            <h1 class="shout lead" id="doc-main-h1">@yield('title')</h1>
        @endif
    </div>
</div>
