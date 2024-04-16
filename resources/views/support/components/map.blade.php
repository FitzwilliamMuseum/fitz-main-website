@if(!empty($component['map_positioning']))
    @mapstyles

    <div class="container map-box ">
        @yield('map')
    </div>
@endif