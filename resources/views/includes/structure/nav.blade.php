<!-- Nav bars -->
<nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
  <a class="navbar-brand" href="{{ route('home') }}">
    <img src="/images/logos/Fitz_logo_white.png" alt="The Fitzwilliam Museum Logo" height="60" width="" class="ml-1 mr-1">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
  aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarText">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item {{ (Request()->is('/')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item {{ (request()->is('visit-us')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('visit') }}" >Visit</a>
    </li>
    <li class="nav-item {{ (Request()->is('events*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('events') }}">Events & tickets</a>
    </li>

    <li class="nav-item {{ (Request()->is('objects-and-artworks*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('objects') }}" >Our Collection</a>
    </li>
    <li class="nav-item {{ (Request()->is('learning')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('landing', ['learning']) }}" >
      Learning</a>
    </li>
    <li class="nav-item {{ (Request()->is('about-us')) ? 'active' : '' }}">
      <a class="nav-link " href="{{ route('landing', ['about-us']) }}" >
      About</a>
    </li>
    <li class="nav-item {{ (Request()->is('research')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('landing', ['research']) }}" >Research</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="https://curatingcambridge.co.uk/collections/the-fitzwilliam-museum">Shop</a>
    </li>
</ul>
{{ \Form::open(['url' => url('search/results'),'method' => 'GET', 'class' => 'form-inline ml-auto']) }}
  <label for="search" class="sr-only">Search: </label>
  <input id="query" name="query" type="text" class="form-control mr-sm-2"
  placeholder="Search our site" required value="{{ old('query') }}" aria-label="Your query">
  <button type="submit" class="btn btn-outline-light my-2 my-sm-0" id="searchButton" aria-label="Submit your search">Search</button>
{!! Form::close() !!}
</div>
</nav>
