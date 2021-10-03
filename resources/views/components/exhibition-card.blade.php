<div class="col-md-4 mb-3">
  <div class="card card-fitz h-100">
    @isset($image)
      <a href="{{ route($route, $params) }}">
        <img class="card-img-top" src="{{ $image['data']['thumbnails'][2]['url']}}"
        alt="{{ $altTag }}"
        width="{{ $image['data']['thumbnails'][2]['width'] }}"
        loading="lazy" />
      </a>
    @else
      <a href="{{ route($route, $params) }}">
        <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
        alt="A stand in image for {{ $title }}"
        loading="lazy" />
      </a>
    @endisset
    <div class="card-body h-100">
      <div class="contents-label mb-3">
        <h3 class="lead">
          <a href="{{ route($route, $params) }}" class="stretched-link">
            {{ $title }}
          </a>
        </h3>
        @if($status === 'current' && $ticketed === true && !is_null($tessitura_string))
          <p class="text-info">Ticket and timed entry</p>
          <a class="btn btn-dark mb-2" href="https://tickets.museums.cam.ac.uk/overview/{{ $tessitura_string }}">Book now</a>
        @elseif($status === 'current')
          <p class="text-info">Included in General admission</p>
        @endif
        <p class="text-info">
          {{  Carbon\Carbon::parse($startDate)->format('l dS F Y') }} to
          {{  Carbon\Carbon::parse($endDate)->format('l dS F Y') }}
        </p>
        @if($status === 'archived')
        <span class="badge badge-lg badge-info p-2 d-block">
          This is now closed
        </span>
        @endif
      </div>
    </div>
  </div>
</div>
