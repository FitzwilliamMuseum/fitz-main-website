@if(in_array(Route::currentRouteName(), ['home', 'events', 'visit', 'exhibitions']))
<div class="container-fluid bg-maroon text-white p-1">
  <div class="container">
    <div class="text-center my-2">
      <a class="text-center btn btn-outline-light" href="https://tickets.museums.cam.ac.uk/overview/generaladmission">
        @fa('ticket-alt', 'ticket', 'mr-2')  Visiting us? Booking required - Free Entry
      </a>
    </div>

    <p class="text-center text-black">
      Tuesday - Saturday: 10:00 - 17:00 |
      Sundays and Bank Holiday Mondays: 12:00 - 17:00 |   Box office closed Mondays
      <br />
      Closed 24th December to 27th December 2021 and 31st December 2021 to 1st January 2022 inclusive
      @fa('door-closed', 'closed') <a class="free_ticket" href="{{ URL::to('/visit-us/gallery-closures-and-collection-updates') }}" >Gallery closures and collection updates</a>
    </p>
  </div>
</div>
@endif
