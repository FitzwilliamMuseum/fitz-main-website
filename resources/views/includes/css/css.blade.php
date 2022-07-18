<link rel="preconnect" href="https://fonts.gstatic.com">

@vite('resources/css/app.css')

@vite('resources/css/fitzwilliam.css')
@hasSection('audio-guide')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.6/plyr.css" rel="stylesheet" media="screen">
@endif
@yield('plyr-css')
<style>
.head {
  background-image: url('@yield('hero_image')');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 50% 30%;
}
@include('includes.css.parallax')
</style>

