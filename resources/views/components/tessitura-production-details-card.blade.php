<div class="col-md-4 mb-3 event-wrapper" typeof="Event" vocab="https://schema.org/" data-component="card">
    <div class="card h-100">
        @if($production->Facility->Id === 21)
            <a class="stretched-link"
               href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">
                <img class="card-img-top" property="image"
                     src="@tessitura($production->ProductionSeason->Id)"
                     alt=""
                />
            </a>
        @elseif($production->Facility->Id === 56)
            <a class="stretched-link"
               href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">
                <img property="image" class="card-img-top"
                     src="@tessitura($production->PerformanceId )"
                     alt=""
                />
            </a>
        @else
            <a class="stretched-link"
               href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">
                <img class="card-img-top" property="image"
                     src="@tessitura($production->ProductionSeason->Id)"
                     alt=""
                />
            </a>
        @endif
        <div class="card-body">
            <div class="contents-label mb-3">
                <h2>
                    <a class="stretched-link" property="url"
                       href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">
                                                <span class="event-title"
                                                      property="name">{{ $production->PerformanceDescription }}</span>
                    </a>
                </h2>
                <h5 property="startDate"
                    content="{{ Carbon\Carbon::parse($production->PerformanceDate)->format('j F Y')  }}">
                    {{ Carbon\Carbon::parse($production->PerformanceDate)->format('j F Y')  }}
                    <span property="endDate"
                          content="{{ Carbon\Carbon::parse($production->PerformanceDate)->format('j F Y')  }}"></span>
                </h5>
                @if($production->PerformanceDescription === 'The Human Touch')
                    <p>This includes general admission</p>
                @endif

                @if($production->PerformanceStatusDescription == 'Cancelled')
                    <p class="text-danger text-uppercase">{{ $production->PerformanceStatusDescription }}</p>
                @endif
                @php
                    use App\TessituraApi;
                    $tmp = TessituraApi::getPerfPrices($production->PerformanceId)
                @endphp
                @isset($tmp[0]->Price)
                    @if($tmp[0]->Price > 0 )
                        <p class="text-info event-price">
                            @svg('fas-ticket-alt',['width' => 20, 'height' => 20]) From
                            <meta property="priceCurrency" content="GBP"/>
                            &pound;
                            <meta property="price"
                                  content="{{ $tmp[0]->Price }}"/>{{ $tmp[0]->Price }}
                        </p>
                    @else
                        <p class="text-info">FREE ENTRY/ Suggested Donation</p>
                    @endif
                    @if($production->Facility->Id != 19)
                        <span class="visually-hidden">Location: <span class="event-venue"
                                                              property="location"
                                                              typeof="Place">
                      <span property="name">The Fitzwilliam Museum</span>
                      <span property="address">Trumpington Street, Cambridge CB2 1RB </span>
                    </span>
                  @endif
                            @if($production->Facility->Id != 19)
                                <span property="eventAttendanceMode"
                                      content="OfflineEventAttendanceMode"></span>
                            @else
                                <span property="eventAttendanceMode"
                                      content="OnlineEventAttendanceMode"></span>
                            @endif
                   <span property="organizer" typeof="organization">
                     <meta property="name" content="The Fitzwilliam Museum">
                     <meta property="url" content="{{ env('APP_URL') }}">
                   </span>
                @endisset
                @isset($production->Duration)
                    <p>Duration: <meta property="duration" content="PT{{ $production->Duration }}M00S">{{ $production->Duration }} minutes</p>
                @endisset
            </div>
        </div>
    </div>
</div>
