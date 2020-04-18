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
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      About us</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ URL::to('/about-us') }}">About us</a>
        <a class="dropdown-item" href="{{ URL::to('/collections') }}">Our collections</a>
        <a class="dropdown-item" href="{{ URL::to('/departments') }}">Our departments</a>
        <a class="dropdown-item" href="{{ URL::to('/galleries') }}">Our galleries</a>
        <a class="dropdown-item" href="{{ URL::to('/about-us/press-room') }}">Our press room</a>
      </div>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ URL::to('/exhibitions') }}">Exhibitions</a>
    </li>
        <li class="nav-item active">
      <a class="nav-link" href="https://my.fitzmuseum.cam.ac.uk">Events</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ URL::to('/news') }}">News</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Objects and artworks</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ URL::to('/objects-and-artworks') }}">An introduction</a>
        <a class="dropdown-item" href="{{ URL::to('/objects-and-artworks/image-library') }}">Image library</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Learning</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ URL::to('/learning') }}">Learn with us</a>
        <a class="dropdown-item" href="/learning/look-think-do">Look, think, do</a>
        <a class="dropdown-item" href="/learning/resources">Resources</a>
      </div>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ URL::to('/support-us') }}">Support us</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Our research</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ URL::to('/research') }}">Research at the museum</a>
        <a class="dropdown-item" href="/research/projects">Research projects</a>
        <a class="dropdown-item" href="/research/staff-profiles">Researcher profiles</a>

      </div>
    </li>
</ul>
</div>
</nav>
