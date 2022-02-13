@if(in_array(Route::currentRouteName(), ['home', 'events', 'visit', 'exhibitions']))
<div class="container-fluid bg-dark text-white p-1">
  <div class="container">
    <div class="text-center my-2">
      <a class="text-center btn btn-outline-light btn__book" href="https://tickets.museums.cam.ac.uk/overview/generaladmission">
        @fa('ticket-alt', 'ticket', 'mr-2')  Visiting us? Booking required - Free Entry
      </a>
    </div>

    <p class="text-center text-black">
      @include('includes.structure.opening-hours')
      @fa('door-closed', 'closed') <a class="free_ticket" href="{{ URL::to('/visit-us/gallery-closures-and-collection-updates') }}" >Gallery closures and collection updates</a>
    </p>
  </div>
</div>
@endif
