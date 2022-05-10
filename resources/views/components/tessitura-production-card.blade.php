<div class="col-md-4 mb-3">
    <div class="card h-100">
        @if($production->Facility->Id === 21)
            <a class="stretched-link"
               href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">
                <img class="card-img-top" src="@tessitura($production->ProductionSeason->Id)"
                     alt="A stand in image for "/>
            </a>
        @else
            <a class="stretched-link"
               href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">
                <img class="card-img-top" src="@tessitura($production->ProductionSeason->Id)"
                     alt="A stand in image for "/>
            </a>
        @endif
        <div class="card-body ">
            <div class="contents-label mb-3">
                <h3>
                    <a class="stretched-link"
                       href="https://tickets.museums.cam.ac.uk/{{ $production->ProductionSeason->Id }}/{{ $production->PerformanceId }}">
                        {{ $production->PerformanceDescription }}
                    </a>
                </h3>
                <h5>
                    {{ Carbon\Carbon::parse($production->PerformanceDate)->format('l j F Y')  }}
                </h5>
                @if($production->PerformanceDescription === 'The Human Touch')
                    <p>This includes general admission</p>
                @endif

                @if($production->PerformanceStatusDescription == 'Cancelled')
                    <p class="text-danger text-uppercase">{{ $production->PerformanceStatusDescription }}</p>
                @endif
                @php
                    use App\TessituraApi;$tmp = TessituraApi::getPerfPrices($production->PerformanceId)
                @endphp
                @isset($tmp[0]->Price)
                    @if($tmp[0]->Price > 0 )
                        <p class="text-info">
                            @fa('pound-sign') @fa('ticket-alt')<br/>
                            From £{{ $tmp[0]->Price }}
                        </p>
                    @else
                        <p class="text-info">FREE ENTRY/ Suggested Donation</p>
                    @endif
                @endisset
                @isset($production->Duration)
                    <p>Duration: {{ $production->Duration }} minutes</p>
                @endisset
            </div>
        </div>
    </div>
</div>
