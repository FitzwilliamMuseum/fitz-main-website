<!-- Jumbotron -->
<div class="container-fluid head parallax">

<h1 class="shout ">@yield('title')</h1>
<a aria-label="The main Fitzwilliam website" href="https://www.fitzmuseum.cam.ac.uk"><img src="{{ URL::to('/images/logos/FV.svg') }}"
width="100px" alt="The Fitz Logo"/></a>
<a tabindex="0" class="further-info fa-stack fa-lg float-right mr-4 mb-4" role="button" data-toggle="popover"
data-placement="left" data-content="@yield('hero_image_title')">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-info fa-stack-1x fa-inverse"></i>
</a>
</div>
