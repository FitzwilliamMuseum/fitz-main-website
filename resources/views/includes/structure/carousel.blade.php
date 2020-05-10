<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ $carousel['data']['image_one']['data']['full_url']}}"
      alt="{{ $carousel['data']['image_one_alt_text'] }}" loading="lazy" />
      <div class="carousel-caption d-none d-md-block bg-black">
        <h5>{{ $carousel['data']['image_one_alt_text'] }}</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_two']['data']['full_url']}}"
      alt="{{ $carousel['data']['image_two_alt_text']}}" loading="lazy" />
      <div class="carousel-caption d-none d-md-block bg-black">
        <h5>{{ $carousel['data']['image_two_alt_text']}}</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_three']['data']['full_url']}}"
      alt="{{ $carousel['data']['image_three_alt_text'] }}" loading="lazy"/>
      <div class="carousel-caption d-none d-md-block bg-black">
        <h5>{{ $carousel['data']['image_three_alt_text'] }}</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_four']['data']['full_url']}}"
      alt="{{ $carousel['data']['image_four_alt_text'] }}" loading="lazy"/>
      <div class="carousel-caption d-none d-md-block bg-black">
        <h5>{{ $carousel['data']['image_four_alt_text'] }}</h5>
      </div>
    </div>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
