<div class="col-md-4 mb-3 {{ !empty($source) && $source == 'homepage' ? 'container-home-card' : '' }}"
    data-component="card">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h{{ $headingLevel ?? '3' }} class="card__heading">
                <a class="card__link" href="{{ route($route, $params) }}">
                    {{ $title }}
                </a>
                </h{{ $headingLevel ?? '3' }}>

                @if (in_array($status, ['current', 'future']) && $ticketed === true && !is_null($tessitura))
                    <p class="text-dark">Ticket and timed entry</p>
                    <a class="btn btn-dark mb-2"
                        href="https://tickets.museums.cam.ac.uk/overview/{{ $tessitura }}">Book
                        now</a>
                @endif

                <p class="text-dark">
                    {{ Carbon\Carbon::parse($startDate)->format('j F Y') }}
                    @unless ($displayEndDate)
                        to
                        {{ Carbon\Carbon::parse($endDate)->format('j F Y') }}
                    @endunless
                </p>

                @if ($status === 'archived')
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

        <div class="l-frame l-frame--3-2 card__image">
            @if (!empty($listingImage))
                <img src="{{ $listingImage['data']['full_url'] }}" alt="" loading="lazy" />
            @elseif(!empty($image))
                <img src="{{ $image['data']['thumbnails'][13]['url'] }}" alt="" loading="lazy" />
            @else
                <img src="{{ env('MISSING_IMAGE_URL') }}" alt="" loading="lazy" />
            @endif
        </div>
    </div>
</div>
