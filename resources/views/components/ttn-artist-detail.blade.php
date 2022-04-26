<div class="container-fluid py-3">
    <div class="container">
        <div class=" py-3 bg-white">
            <p>
                Nationality: {{$artist[0]['nationality'] ?? 'Not known'}}
            </p>
            <p>
                {{$artist[0]['year_of_birth']}} - {{$artist[0]['year_of_death']}}
            </p>

            @markdown($artist[0]['biography'])
            @if(!empty($artist[0]['place_of_birth']))
                <p>
                    Place of Birth: {{$artist[0]['place_of_birth']}}<br/>
                    Place of Death: {{$artist[0]['place_of_death']}}
                </p>
            @endif
            @if($artist[0]['biography_author'])
                <p>
                    Text written and researched by {{ $artist[0]['biography_author'] }}
                    @if($artist[0]['biography_author'] === 'Amy Marquis')
                         Fitzwilliam Museum, University of Cambridge.
                        @else
                         National Gallery of Art, Washington DC.
                    @endif
                </p>
            @endif
        </div>
    </div>
</div>
@if(!empty($artist[0]['birth_lat']))
@section('map')
    <div class="container p-3">
        @map(
        [
        'lat' => $artist[0]['birth_lat'],
        'lng' => $artist[0]['birth_lon'],
        'zoom' => 6,
        'minZoom' => 6,
        'maxZoom' => 18,
        'markers' => [
        [
        'title' => 'Place of birth',
        'lat' => $artist[0]['birth_lat'],
        'lng' => $artist[0]['birth_lon'],
        'popup' => '<h3>Place of birth</h3>',
        ],
        [
        'title' => 'Place of death',
        'lat' => $artist[0]['death_lat'],
        'lng' => $artist[0]['death_lon'],
        'popup' => '<h3>Place of death</h3>',
        ],

        ],
        ])
    </div>
@endsection
@endif
