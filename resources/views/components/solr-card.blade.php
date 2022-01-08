<div class="col-md-4 mb-3">
  <div class="card card-fitz h-100">
    @if(!is_null($result['smallimage']))
      <a href="{{ $result['url'][0] }}" class="stretched-link"><div class="embed-responsive embed-responsive-4by3">
        <img class="img-fluid embed-responsive-item" src="{{ $result['smallimage'][0]}}"
        alt="Highlight image for {{ $result['title'][0] }}" loading="lazy"/></a>
      </div>
    @else
        <img class="embed-responsive embed-responsive-4by3" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
        alt="A stand in image for {{ $result['title'][0] }}"
        loading="lazy" />
    @endif
    <div class="card-body ">
      <div class="contents-label mb-3">
        <h3>
          <a href="{{ $result['url'][0] }}" class="stretched-link">{{ $result['title'][0] }}</a>
        </h3>
      </div>
    </div>
  </div>
</div>
