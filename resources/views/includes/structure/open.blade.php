@if(in_array(Route::currentRouteName(), ['home', 'events', 'visit', 'exhibitions']))
    <div class="container-fluid bg-dark text-white p-1">
        <div class="container text-center pt-2">
            @if(!empty($bookingLink))
                <div class="text-center mb-2">
                    <a class="text-center btn btn-outline-light btn__book"
                       href="{{ $bookingLink }}">
                        <x-fas-ticket width="25" height="25"/>
                        Visiting us? Book Free Entry
                    </a>
                </div>
            @endif
            <div class="open-link">
                @include('includes.structure.opening-hours')
            </div>
            <p class="text-center">

                <x-fluentui-building-bank-toolbox-24 width="25" height="25"/>
                <a class="free_ticket" href="{{ URL::to('/visit-us/gallery-closures-and-collection-updates') }}">Gallery closures and collection updates</a>
            </p>
        </div>
    </div>
@endif
