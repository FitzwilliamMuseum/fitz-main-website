<link rel="preconnect" href="https://fonts.gstatic.com">

<link rel="stylesheet" href="{{ mix('css/app.css') }}" media="screen" />

<link rel="stylesheet" href="{{ mix('css/fitzwilliam.css') }}" media="screen" />
@hasSection('audio-guide')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.6/plyr.css" rel="stylesheet" media="screen">
@endif
@yield('plyr-css')
<style>
    .head {
        background: url('@yield('hero_image')') no-repeat center top / cover;
    }

    @include('includes.css.parallax');
</style>
@hasSection('360')
    <link rel="stylesheet" href="{{ asset('/css/pannellum.css') }}" />
@endif
