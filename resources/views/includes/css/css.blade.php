<link rel="preconnect" href="https://fonts.gstatic.com">

<link rel="stylesheet" href="{{ mix('css/app.css') }}" media="screen"/>

<link rel="stylesheet" href="{{ mix('css/fitzwilliam.css') }}" media="screen" />
@hasSection('audio-guide')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.6/plyr.css" rel="stylesheet" media="screen">
@endif
@yield('plyr-css')
<style>
.head {
    background-image: url('@yield('hero_image')');
    background-image: url('https://fitz-cms-images.s3.eu-west-2.amazonaws.com/homepage-adjusted-2000x1000_1.png');
    background-image: url('{{ $exhibitions['data'][0]['hero_image']['data']['full_url'] }}');

    background-repeat: no-repeat;
    background-size: cover;
    background-position: 50% 30%;
    display: flex;
    isolation: isolate;
    z-index: 100;
    position: relative;
}
}
@include('includes.css.parallax')
</style>
@hasSection('360')
    <link rel="stylesheet" href="{{ asset("/css/pannellum.css")}}"/>
@endif
