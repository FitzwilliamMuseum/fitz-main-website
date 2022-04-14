@if(in_array(Route::currentRouteName(), ['home', 'events', 'visit', 'exhibitions']))
    <div class="container-fluid bg-dark text-white p-1">
        <div class="container text-center">
            <div class="text-center my-2">
                <a class="text-center btn btn-outline-light btn__book"
                   href="{{ $bookingLink }}">
                    @fa('ticket-alt', 'ticket', 'mr-2') Visiting us? Book Free Entry
                </a>
            </div>

                @include('includes.structure.opening-hours')
            <p class="text-center">

            @fa('door-closed', 'closed') <a class="free_ticket"
                                                href="{{ URL::to('/visit-us/gallery-closures-and-collection-updates') }}">Gallery
                    closures and collection updates</a>
            </p>
        </div>
    </div>
@endif
