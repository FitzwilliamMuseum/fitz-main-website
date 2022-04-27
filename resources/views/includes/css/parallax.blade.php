@hasSection('parallax_two')
    .second-parallax-home {
    min-height: 400px;
    background-image: url(@yield('parallax_two'));
    background-repeat: no-repeat;
    background-size: cover;
    }
@endif
@hasSection('parallax_home')
    .parallax-home {
    min-height: 400px;
    background-image: url(@yield('parallax_home'));
    background-repeat: no-repeat;
    background-size: cover;
    }
@endif
@hasSection('collection-parallax')
    .parallax-collection {
    min-height: 300px;
    background-image: url(@yield('collection-parallax'));
    background-repeat: no-repeat;
    background-size: cover;
    }
@endif
