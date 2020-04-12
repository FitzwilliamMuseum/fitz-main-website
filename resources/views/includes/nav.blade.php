<!-- Nav bars -->

<nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
  <a class="navbar-brand order-md-last " href="{{ URL::to('/') }}">The Fitzwilliam Museum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
  aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarText">
  <ul class="navbar-nav mr-auto">

    <li class="nav-item active">
      <a class="nav-link" href="{{ URL::to('/') }}">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ URL::to('/visit-us') }}">Visit us</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ URL::to('/about-us') }}">About us</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ URL::to('/news') }}">Latest news</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ URL::to('/objects-and-artworks') }}">Objects and artworks</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ URL::to('/learning') }}">Learn with us</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ URL::to('/support-us') }}">Support us</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ URL::to('/research') }}">Our research</a>
    </li>
</ul>
</div>
</nav>
