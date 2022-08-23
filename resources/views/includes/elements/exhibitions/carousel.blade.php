@if(!empty($exhibition['exhibition_carousel']))
    @section('excarousel')
        <div class="container-fluid bg-white py-2">
            <div class="container">
                <div class="bd-example mb-3">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"
                         data-interval="10000">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class=""></li>
                            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class=""></li>
                            @if(array_key_exists('image_four_alt_text',$exhibition['exhibition_carousel'][0]['carousels_id']))
                                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" class=""></li>
                            @endif
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100"
                                     alt="{{ $exhibition['exhibition_carousel'][0]['carousels_id']['image_one_alt_text'] }}"
                                     src="{{ $exhibition['exhibition_carousel'][0]['carousels_id']['image_one']['data']['thumbnails'][4]['url'] }}">
                                <div class="carousel-caption d-none d-md-block text-dark exhibition-carousel">
                                    <p>{{ $exhibition['exhibition_carousel'][0]['carousels_id']['image_one_alt_text'] }}</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                     alt="{{ $exhibition['exhibition_carousel'][0]['carousels_id']['image_two_alt_text'] }}"
                                     src="{{ $exhibition['exhibition_carousel'][0]['carousels_id']['image_two']['data']['thumbnails'][4]['url'] }}">
                                <div class="carousel-caption d-none d-md-block text-dark exhibition-carousel">
                                    <p>{{ $exhibition['exhibition_carousel'][0]['carousels_id']['image_two_alt_text'] }}</p>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <img class="d-block w-100"
                                     alt="{{ $exhibition['exhibition_carousel'][0]['carousels_id']['image_three_alt_text'] }}"
                                     src="{{ $exhibition['exhibition_carousel'][0]['carousels_id']['image_three']['data']['thumbnails'][4]['url'] }}">
                                <div class="carousel-caption  d-none d-md-block text-dark exhibition-carousel">
                                    <p>{{ $exhibition['exhibition_carousel'][0]['carousels_id']['image_three_alt_text'] }}</p>
                                </div>
                            </div>
                            @if(array_key_exists('image_four_alt_text',$exhibition['exhibition_carousel'][0]['carousels_id']))
                                <div class="carousel-item ">
                                    <img class="d-block w-100"
                                         alt="{{ $exhibition['exhibition_carousel'][0]['carousels_id']['image_four_alt_text'] }}"
                                         src="{{ $exhibition['exhibition_carousel'][0]['carousels_id']['image_four']['data']['thumbnails'][4]['url'] }}">
                                    <div class="carousel-caption d-none d-md-block text-dark exhibition-carousel">
                                        <p>{{ $exhibition['exhibition_carousel'][0]['carousels_id']['image_four_alt_text'] }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                           data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                           data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
