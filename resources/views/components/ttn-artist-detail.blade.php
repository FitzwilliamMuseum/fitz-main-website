<div class="container-fluid py-3">
    <div class="container">
        <div class=" py-3 bg-white">
            <p>
                Nationality: {{$artist['nationality'] ?? 'Not known'}}
            </p>
            <p>
                {{$artist['year_of_birth']}} - {{$artist['year_of_death']}}
            </p>

            @markdown($artist['biography'] ?? 'No biography available')
            @if(!empty($artist['place_of_birth']))
                <p>
                    Place of Birth: {{$artist['place_of_birth']}}<br/>
                    Place of Death: {{$artist['place_of_death']}}
                </p>
            @endif
            @if($artist['biography_author'])
                <p>
                    Text written and researched by {{ $artist['biography_author'] }}
                    @if($artist['biography_author'] === 'Amy Marquis')
                         Fitzwilliam Museum, University of Cambridge.
                        @else
                         National Gallery of Art, Washington DC.
                    @endif
                </p>
            @endif
        </div>
    </div>
</div>
@if(!empty($artist['birth_lat']))
@section('map')
    <div class="container p-3">
        @map(
        [
        'lat' => $artist['birth_lat'],
        'lng' => $artist['birth_lon'],
        'zoom' => 6,
        'minZoom' => 6,
        'maxZoom' => 18,
        'markers' => [
        [
        'title' => 'Place of birth',
        'lat' => $artist['birth_lat'],
        'lng' => $artist['birth_lon'],
        'popup' => '<h3>Place of birth</h3>',
        ],
        [
        'title' => 'Place of death',
        'lat' => $artist['death_lat'],
        'lng' => $artist['death_lon'],
        'popup' => '<h3>Place of death</h3>',
        ],

        ],
        ])
    </div>
@endsection
@endif
