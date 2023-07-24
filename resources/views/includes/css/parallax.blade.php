@hasSection('parallax_two')
    .second-parallax-home {
    min-height: 400px;
    background-image: url(@yield('parallax_two'));
    background-image: url('https://fitz-cms-images.s3.eu-west-2.amazonaws.com/homepage-adjusted-2000x1000_1.png');
    background-image: url('{{ $exhibitions['data'][0]['hero_image']['data']['full_url'] }}');

    background-repeat: no-repeat;
    background-size: cover;
    }
@endif
@hasSection('parallax_home')
    .parallax-home {
    min-height: 400px;
    background-image: url(@yield('parallax_home'));
    background-image: url('https://fitz-cms-images.s3.eu-west-2.amazonaws.com/homepage-adjusted-2000x1000_1.png');
    background-image: url('{{ $exhibitions['data'][0]['hero_image']['data']['full_url'] }}');

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
