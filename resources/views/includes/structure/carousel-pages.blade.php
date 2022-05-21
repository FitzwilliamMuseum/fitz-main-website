<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" style="background-image: url({{ $page['carousel_associated'][0]['carousels_id']['image_one']['data']['full_url']}});">
      <img class="d-block w-100" src="{{ $page['carousel_associated'][0]['carousels_id']['image_one']['data']['thumbnails'][2]['url']}}"
      alt="{{ $page['carousel_associated'][0]['carousels_id']['image_one_alt_text'] }}" loading="lazy" />
      <div class="carousel-caption d-none d-md-block bg-black p-3">
        <h5>{{ $page['carousel_associated'][0]['carousels_id']['image_one_alt_text'] }}</h5>
      </div>
    </div>
    <div class="carousel-item" style="background-image: url({{ $page['carousel_associated'][0]['carousels_id']['image_two']['data']['full_url']}});">
      <img class="d-block w-100" src="{{ $page['carousel_associated'][0]['carousels_id']['image_two']['data']['thumbnails'][2]['url']}}"
      alt="{{ $page['carousel_associated'][0]['carousels_id']['image_two_alt_text']}}" loading="lazy"  />
      <div class="carousel-caption d-none d-md-block bg-black p-3">
        <h5>{{ $page['carousel_associated'][0]['carousels_id']['image_two_alt_text']}}</h5>
      </div>
    </div>
    <div class="carousel-item" style="background-image: url({{ $page['carousel_associated'][0]['carousels_id']['image_three']['data']['full_url']}});">
      <img class="d-block w-100" src="{{ $page['carousel_associated'][0]['carousels_id']['image_three']['data']['thumbnails'][2]['url']}}"
      alt="{{ $page['carousel_associated'][0]['carousels_id']['image_three_alt_text'] }}" loading="lazy" />
      <div class="carousel-caption d-none d-md-block bg-black p-3">
        <h5>{{ $page['carousel_associated'][0]['carousels_id']['image_three_alt_text'] }}</h5>
      </div>
    </div>
    <div class="carousel-item" style="background-image: url({{ $page['carousel_associated'][0]['carousels_id']['image_four']['data']['full_url']}});">
      <img class="d-block w-100" src="{{ $page['carousel_associated'][0]['carousels_id']['image_four']['data']['thumbnails'][2]['url']}}"
      alt="{{ $page['carousel_associated'][0]['carousels_id']['image_four_alt_text'] }}" loading="lazy" />
      <div class="carousel-caption d-none d-md-block bg-black p-3">
        <h5>{{ $page['carousel_associated'][0]['carousels_id']['image_four_alt_text'] }}</h5>
      </div>
    </div>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
