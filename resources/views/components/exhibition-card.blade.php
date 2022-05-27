<div class="col-md-4 mb-3">
    <div class="card card-fitz h-100">
        @isset($image)
            <a href="{{ route($route, $params) }}">
                <img class="card-img-top" src="{{ $image['data']['thumbnails'][13]['url']}}"
                     alt="{{ $altTag }}"
                     width="{{ $image['data']['thumbnails'][13]['width'] }}"
                     height="{{ $image['data']['thumbnails'][13]['height'] }}"
                     loading="lazy"
                />
            </a>
        @else
            <a href="{{ route($route, $params) }}">
                <img class="card-img-top"
                     src="{{ env('MISSING_IMAGE_URL') }}"
                     alt="A stand in image for {{ $title }}"
                     loading="lazy"
                />
            </a>
        @endisset

        <div class="card-body h-100">
            <div class="contents-label mb-3">
                <h2>
                    <a href="{{ route($route, $params) }}" class="stretched-link">
                        {{ $title }}
                    </a>
                </h2>
                @if($status === 'current' && $ticketed === true && !is_null($tessitura))
                    <p class="text-dark">Ticket and timed entry</p>
                    <a class="btn btn-dark mb-2" href="https://tickets.museums.cam.ac.uk/overview/{{ $tessitura }}">Book
                        now</a>
                @elseif($status === 'current')
                    <p class="text-dark">Included in General admission</p>
                @endif
                <p class="text-dark">
                    {{  Carbon\Carbon::parse($startDate)->format('l dS F Y') }} to
                    {{  Carbon\Carbon::parse($endDate)->format('l dS F Y') }}
                </p>
                @if($status === 'archived')
                    <span class="badge bg-dark p-2 d-block">
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
