<div class="col-md-4 mb-3 {{ !empty($source) && $source == "homepage" ? 'container-home-card' : ''}}" data-component="card">
    <div class="card card-fitz h-100">
        @isset($image)
            <img class="card-img-top" src="{{ $image['data']['thumbnails'][13]['url']}}"
                    alt="{{ $altTag }}"
                    width="{{ $image['data']['thumbnails'][13]['width'] }}"
                    height="{{ $image['data']['thumbnails'][13]['height'] }}"
                    loading="lazy"
            />
        @else
            <img class="card-img-top"
                    src="{{ env('MISSING_IMAGE_URL') }}"
                    alt="A stand in image for {{ $title }}"
                    loading="lazy"
            />
        @endisset

        <div class="card-body h-100" >
            <div class="contents-label mb-3">
                @if(!empty($headingLevel))
                    <h{{ $headingLevel }}>
                @else
                    <h2>
                @endif
                    <a href="{{ route($route, $params) }}" class="stretched-link">
                        {{ $title }}
                    </a>
                @if(!empty($headingLevel))
                    </h{{ $headingLevel }}>
                @else
                    </h2>
                @endif
                @if(in_array($status, array('current','future')) && $ticketed === true && !is_null($tessitura))
                    <p class="text-dark">Ticket and timed entry</p>
                    <a class="btn btn-dark mb-2" href="https://tickets.museums.cam.ac.uk/overview/{{ $tessitura }}">Book
                        now</a>
                {{-- @elseif($status === 'current')
                    <p class="text-dark">Included in General admission</p> --}}
                @endif
                <p class="text-dark">
                    {{  Carbon\Carbon::parse($startDate)->format('j F Y') }} to
                    {{  Carbon\Carbon::parse($endDate)->format('j F Y') }}
                </p>
                @if($status === 'archived')
                    <span class="archived-btn">
                        Now closed
                    </span>
                @endif
                @isset($copyright)
                    <div class="my-2 text-dark">
                        {{ $copyright }}
                    </div>
                @endisset
            </div>
        </div>
    </div>
</div>
