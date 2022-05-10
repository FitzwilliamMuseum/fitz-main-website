<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @isset($image)
            <a href="{{ route($route, $params) }}">
                <img class="card-img-top" src="{{ $image['data']['thumbnails'][13]['url']}}"
                     alt="{{ $altTag }}"
                     width="{{ $image['data']['thumbnails'][13]['width'] }}"
                     loading="lazy"
                />
            </a>
        @else
            <a href="{{ route($route, $params) }}">
                <img class="card-img-top"
                     src="https://content.fitz.ms/fitz-website/assets/gallery3_roof.jpg?key=directus-large-crop"
                     alt="A stand in image for {{ $title }}"
                     loading="lazy"
                />
            </a>
        @endisset

        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h3>
                    <a href="{{ route($route, $params) }}" class="stretched-link">
                        {{ $title }}
                    </a>
                </h3>
                @if($status === 'current' && $ticketed === true && !is_null($tessitura))
                    <p class="text-info">Ticket and timed entry</p>
                    <a class="btn btn-dark mb-2" href="https://tickets.museums.cam.ac.uk/overview/{{ $tessitura }}">Book
                        now</a>
                @elseif($status === 'current')
                    <p class="text-info">Included in General admission</p>
                @endif
                <p class="text-info">
                    {{  Carbon\Carbon::parse($startDate)->format('l dS F Y') }} to
                    {{  Carbon\Carbon::parse($endDate)->format('l dS F Y') }}
                </p>
                @if($status === 'archived')
                    <span class="badge bg-maroon p-2 d-block">
                        This is now closed
                    </span>
                @endif
            </div>
        </div>
        @isset($copyright)
            <div class="copyright copyright-text mx-2 my-2 text-dark">
                {{ $copyright }}
            </div>
        @endisset
    </div>
</div>
