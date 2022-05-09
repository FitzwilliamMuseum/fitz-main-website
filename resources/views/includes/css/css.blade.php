<link rel="preconnect" href="https://fonts.gstatic.com">

<link rel="stylesheet" href="{{ mix('css/app.css') }}"/>

<link rel="stylesheet" href="{{ mix('css/fitzwilliam.css') }}" />
<link rel="stylesheet" href="/css/site.css" />

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

