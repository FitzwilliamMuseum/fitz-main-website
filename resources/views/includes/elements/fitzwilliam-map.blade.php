@section('map')
    @map([
    'lat' => 52.199818,
    'lng' => 0.11975,
    'zoom' => 18,
    'minZoom' => 16,
    'maxZoom' => 18,
    'markers' => [
    [
    'title' => 'The Founder\'s Entrance',
    'lat' => 52.20032347341985,
    'lng' => 0.11982414954445642,
    'popup' => '<h3>Founder\'s Entrance</h3><p>Access is via a flight of steps.</p>',

    ],
    [
    'title' => 'The Courtyard Entrance',
    'lat' => 52.19974696477096,
    'lng' => 0.12065154202527271,
    'popup' => '<h3>Courtyard Entrance</h3><p>Accessible step free access.</p>',

    ],
    [
    'title' => 'Cambridge Station',
    'lat' => 52.19433858460627,
    'lng' => 0.1374599593479488,
    'popup' => '<h3>Cambridge Station</h3><p>The railway station.</p>',

    ],
    [
    'title' => 'Cambridge Bus Station',
    'lat' => 52.2054313453068,
    'lng' => 0.12392614778108904,
    'popup' => '<h3>Cambridge Bus Station</h3><p>The central bus station.</p>',

    ],
    ],
    ])
@endsection
