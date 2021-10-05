<div class="col-md-4 mb-3">
  <div class="card card-fitz h-100">
    @isset($result['thumbnail'][0])
      <a href="{{ $result['url'][0] }}">
        <img class="card-img-top" src="{{ $result['thumbnail'][0]}}"
        alt="A product image depicting {{ $result['title'][0] }}"
        loading="lazy" />
      </a>
    @else
      <a href="{{ $result['url'][0] }}">
        <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
        alt="A stand in product image depicting {{ $result['title'][0] }}"
        loading="lazy" />
      </a>
    @endisset
    <div class="card-body h-100">
      <div class="contents-label mb-3">
        <h3 class="lead">
          <a href="{{ $result['url'][0] }}" class="stretched-link">
            {{ $result['title'][0] }}
          </a>
        </h3>
        <p class="text-info">£{{ number_format((float)$result['price'][0], 2, '.', '') }}</p>
      </div>
    </div>
  </div>
</div>