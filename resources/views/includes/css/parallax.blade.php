@hasSection('parallax_two')
    .second-parallax-home {
    min-height: 400px;
    background-image: url(@yield('hero_image'));
    background-repeat: no-repeat;
    background-size: cover;
    }
@endif
@hasSection('parallax_one')

    .parallax-home {
    height: 280px;
    display: none;
    background-repeat: no-repeat;
    background-image: url(@yield('parallax_one'));
    background-size: cover;
    background-position: 50% 30%;
    }

    @media screen and (min-width: 768px) {
        .parallax-home {
            display: block;
        }
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
