<!-- Nav bars -->
<nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
  aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarText">
  <ul class="navbar-nav mr-auto">

    <li class="nav-item active">
      <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAbout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      About</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownAbout">
        <a class="dropdown-item" href="{{ route('landing', ['about-us']) }}">About the Museum</a>
        <a class="dropdown-item" href="{{ route('collections') }}">Collection areas</a>
        <a class="dropdown-item" href="{{ route('departments') }}">Departments</a>
        <a class="dropdown-item" href="{{ route('press-room') }}">Press room</a>
        <a class="dropdown-item" href="{{ route('news') }}">News</a>
      </div>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="https://tickets.museums.cam.ac.uk">Events and tickets</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownVisit" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Visit</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownVisit">
        <a class="dropdown-item" href="{{ route('visit') }}">Your visit</a>
        <a class="dropdown-item" href="{{ route('exhibitions') }}">Exhibitions</a>
        <a class="dropdown-item" href="{{ route('galleries') }}">Galleries</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownObjects" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Collections</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownObjects">
        <a class="dropdown-item" href="{{ route('objects') }}">An introduction</a>
        <a class="dropdown-item" href="{{ URL::to('https://beta.fitz.ms/objects-and-artworks/highlights/') }}">Collection highlights</a>
        <a class="dropdown-item" href="{{ URL('https://collection.beta.fitz.ms') }}">Search the collection</a>
        <a class="dropdown-item" href="{{ route('audio-guide') }}">Audio guide</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLearning" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Learning</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownLearning">
        <a class="dropdown-item" href="{{ route('landing', ['learning']) }}">Learn with us</a>
        <a class="dropdown-item" href="{{ route('landing-section',['learning','families']) }}">Families</a>
        <a class="dropdown-item" href="{{ route('landing-section',['learning','young-people']) }}">Young people</a>
        <a class="dropdown-item" href="{{ route('landing-section',['learning','school-sessions']) }}">Schools</a>
        <a class="dropdown-item" href="{{ route('landing-section',['learning','adult-programming']) }}">Adults</a>
        <a class="dropdown-item" href="{{ route('landing-section',['learning','community-programming']) }}">Communities</a>
        <a class="dropdown-item" href="{{ route('landing-section',['learning','group-activities']) }}">Groups</a>
        <a class="dropdown-item" href="{{ route('learning-resources') }}">Resources</a>
      </div>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('landing', ['support-us']) }}">Support</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownResearch" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Research</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownResearch">
        <a class="dropdown-item" href="{{ route('landing', ['research']) }}">Research at the museum</a>
        <a class="dropdown-item" href="{{ route('research-projects') }}">Research projects</a>
        <a class="dropdown-item" href="{{ route('research-profiles') }}">Researcher profiles</a>
        <a class="dropdown-item" href="{{ route('opportunities') }}">Research opportunities</a>
        <a class="dropdown-item" href="{{ route('resources') }}">Online resources</a>
      </div>
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
