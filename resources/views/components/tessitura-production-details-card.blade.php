<div class="col-md-4 mb-3 event-wrapper" typeof="Event" vocab="https://schema.org/">
    <div class="card" data-component="card">
        <div class="l-box l-box--no-border card__text">
            <h3 class="card__heading">
                <a class="card__link" property="url"
                    href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">
                    <span class="event-title" property="name">{{ $production->PerformanceDescription }}</span>
                </a>
            </h3>
            <h5 property="startDate"
                content="{{ Carbon\Carbon::parse($production->PerformanceDate)->format('j F Y') }}">
                {{ Carbon\Carbon::parse($production->PerformanceDate)->format('j F Y') }}
                <span property="endDate"
                    content="{{ Carbon\Carbon::parse($production->PerformanceDate)->format('j F Y') }}"></span>
            </h5>

            @if ($production->PerformanceDescription === 'The Human Touch')
                <p>This includes general admission</p>
            @endif

            @if ($production->PerformanceStatusDescription == 'Cancelled')
                <p class="text-danger text-uppercase">{{ $production->PerformanceStatusDescription }}</p>
            @endif

            @php
                use App\TessituraApi;
                $tmp = TessituraApi::getPerfPrices($production->PerformanceId);
            @endphp

            @isset($tmp[0]->Price)
                @if ($tmp[0]->Price > 0)
                    <p class="text-info event-price">
                        @svg('fas-ticket-alt', ['width' => 20, 'height' => 20]) From
                        <meta property="priceCurrency" content="GBP" />
                        &pound;
                        <meta property="price" content="{{ $tmp[0]->Price }}" />{{ $tmp[0]->Price }}
                    </p>
                @else
                    <p class="text-info">FREE ENTRY/ Suggested Donation</p>
                @endif

                @if ($production->Facility->Id != 19)
                    <span class="visually-hidden">Location:
                        <span class="event-venue" property="location" typeof="Place">
                            <span property="name">The Fitzwilliam Museum</span>
                            <span property="address">Trumpington Street, Cambridge CB2 1RB</span>
                        </span>
                    </span>
                @endif

                @if ($production->Facility->Id != 19)
                    <span property="eventAttendanceMode" content="OfflineEventAttendanceMode"></span>
                @else
                    <span property="eventAttendanceMode" content="OnlineEventAttendanceMode"></span>
                @endif

                <span property="organizer" typeof="organization">
                    <meta property="name" content="The Fitzwilliam Museum">
                    <meta property="url" content="{{ env('APP_URL') }}">
                </span>
            @endisset

            @isset($production->Duration)
                <p>Duration:
                    <meta property="duration" content="PT{{ $production->Duration }}M00S">{{ $production->Duration }}
                    minutes
                </p>
            @endisset
        </div>

        <div class="l-frame l-frame--3-2 card__image">
            @if ($production->Facility->Id === 21)
                <img property="image" src="@tessitura($production->ProductionSeason->Id)" alt="" loading="lazy" />
            @elseif($production->Facility->Id === 56)
                <img property="image" src="@tessitura($production->PerformanceId)" alt="" loading="lazy" />
            @else
                <img property="image" src="@tessitura($production->ProductionSeason->Id)" alt="" loading="lazy" />
            @endif
        </div>
    </div>
</div>
