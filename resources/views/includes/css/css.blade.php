<!-- CSS -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Rubik&Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<link href="{{ URL::to('/css/site.css') }}" rel="stylesheet" media="screen">
@hasSection('audio-guide')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.6/plyr.css" rel="stylesheet" media="screen">
@endif

<link rel="icon" href="{{ URL::to('/favicon.ico') }}"/>
<style>
.head {
  background-image: url('@yield('hero_image')');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 50% 30%;
}

@hasSection('parallax_two')
.second-parallax-home {
  min-height: 200px;
  background-image: url(@yield('parallax_two'));
  background-repeat: no-repeat;
  background-size: cover;
}
@endif

@hasSection('collection-parallax')
.parallax-collection {
  min-height: 200px;
  background-image: url(@yield('collection-parallax'));
  background-repeat: no-repeat;
  background-size: cover;
}
@endif

@hasSection('parallax_three')
.third-parallax-home {
  min-height: 200px;
  background-image: url(@yield('parallax_three'));
  background-repeat: no-repeat;
  background-size: cover;

}
@endif

@hasSection('parallax_three_lower')
.third-parallax-home-lower {
  min-height: 200px;
  background-image: url(@yield('parallax_three'));
  background-repeat: no-repeat;
  background-size: cover;
  background-position: bottom;

}
@endif

@hasSection('parallax_four')
.fourth-parallax-home {
  min-height: 200px;
  background-image: url(@yield('parallax_four'));
  background-repeat: no-repeat;
  background-size: cover;

}
@endif

@hasSection('parallax_home')
.parallax-home {
  min-height: 200px;
  background-image: url(@yield('parallax_home'));
  background-repeat: no-repeat;
  background-size: cover;
}
@endif

</style>
@hasSection('theme-carousel')
<link href="{{ URL::to('/css/cards-carousel.css') }}" rel="stylesheet" media="screen">

@endif
