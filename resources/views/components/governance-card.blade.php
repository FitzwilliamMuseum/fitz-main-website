<div class="col-md-4 mb-3">
  <div class="card card-fitz h-100">
    @isset($file['data']['thumbnails'])
      <a href="{{ $file['data']['full_url'] }}">
        <img class="card-img-top" src="{{ $image['data']['thumbnails'][2]['url']}}"
        alt="{{ $altTag }}"
        width="{{ $file['data']['thumbnails'][2]['width'] }}"
        loading="lazy" />
      </a>
    @else
      <a href="{{ $file['data']['full_url'] }}">
        <img class="card-img-top" src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
        alt="A stand in image for {{ $title }}"
        loading="lazy" />
      </a>
    @endisset
    <div class="card-body h-100">
      <div class="contents-label mb-3">
        <h3 class="lead">
          <a href="{{ $file['data']['full_url'] }}" class="stretched-link">
            {{ $title }}
          </a>
        </h3>
        <p>@mime($file['type']) - @humansize($file['filesize'])</p>
        <p class="text-info">
          Document type: {{ ucfirst($type) }}
        </p>
      </div>
    </div>
  </div>
</div>
