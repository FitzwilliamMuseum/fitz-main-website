{{-- @dd($carousel['data']) --}}
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner carousel-front">
    <div class="carousel-item active" >
      <img class="d-block w-100" src="{{ $carousel['data']['image_one']['data']['thumbnails'][9]['url']}}"
      alt="{{ $carousel['data']['image_one_alt_text'] }}" loading="lazy" />
      <div class="carousel-caption d-none d-md-block bg-black p-3">
        <h5>{{ $carousel['data']['image_one_alt_text'] }}</h5>
      </div>
    </div>
    <div class="carousel-item" >
      <img class="d-block w-100" src="{{ $carousel['data']['image_two']['data']['thumbnails'][9]['url']}}"
      alt="{{ $carousel['data']['image_two_alt_text']}}" />
      <div class="carousel-caption d-none d-md-block bg-black p-3">
        <h5>{{ $carousel['data']['image_two_alt_text']}}</h5>
      </div>
    </div>
    <div class="carousel-item" >
      <img class="d-block w-100" src="{{ $carousel['data']['image_three']['data']['thumbnails'][9]['url']}}"
      alt="{{ $carousel['data']['image_three_alt_text'] }}"  />
      <div class="carousel-caption d-none d-md-block bg-black p-3">
        <h5>{{ $carousel['data']['image_three_alt_text'] }}</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ $carousel['data']['image_four']['data']['thumbnails'][9]['url']}}"
      alt="{{ $carousel['data']['image_four_alt_text'] }}" />
      <div class="carousel-caption d-none d-md-block bg-black p-3">
        <h5>{{ $carousel['data']['image_four_alt_text'] }}</h5>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
    <svg height="48" viewBox="0 0 48 48" width="64" xmlns="http://www.w3.org/2000/svg">
        <path fill="black" d="M0 0h48v48h-48z"></path>
        <path fill="white" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
    </svg>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
    <svg height="48" viewBox="0 0 48 48" width="64" xmlns="http://www.w3.org/2000/svg">
        <path fill="black" d="M0 0h48v48h-48z"></path>
        <path fill="white" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
    </svg>
    <span class="visually-hidden">Next</span>
  </a>
</div>
