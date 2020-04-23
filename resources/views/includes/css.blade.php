    <!-- CSS -->
    <!-- Add Material font (Roboto) and Material icon as needed -->
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="/css/material.min.css" rel="stylesheet">
    <link href="/css/site.css" rel="stylesheet">
    @hasSection('audio-guide')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.5.6/plyr.css" rel="stylesheet">

    @endif
    <link rel="icon" href="/favicon.ico"/>
    <style>
      .head {
        background-image: url(@yield('hero_image'));
        background-repeat: no-repeat;
        background-size: cover;
      }
      .second-parallax-home {
        min-height: 200px;
        background-image: url(@yield('parallax_two'));
        background-repeat: no-repeat;
        background-size: cover;
      }
      .third-parallax-home {
        min-height: 200px;
        background-image: url(@yield('parallax_three'));
        background-repeat: no-repeat;
        background-size: cover;
      }
      .fourth-parallax-home {
        min-height: 200px;
        background-image: url(@yield('parallax_four'));
        background-repeat: no-repeat;
        background-size: cover;
      }
      .parallax-home {
        min-height: 200px;
        background-image: url(@yield('parallax_home'));
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
