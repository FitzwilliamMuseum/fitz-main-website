@if(array_key_exists('lifecycle',$record['_source'] ))

  @if(array_key_exists('places', $record['_source']['lifecycle']['creation'][0]))
    <h3 class="lead collection">
      Place(s) associated
    </h4>
    <ul class="entities">
      @php
      $coord =  array();
      $placeName = '';
      @endphp
      @foreach($record['_source']['lifecycle']['creation'][0]['places'] as $place)
        @php
        $placeName .= $place['summary_title'];
        @endphp
        <li>
          {{ preg_replace('@\x{FFFD}@u', 'î', $place['summary_title']) }}
          @if(array_key_exists('hierarchies', $place))
            @foreach ($place['hierarchies'] as $hierarchies)
              @php
              $hierarchies = array_reverse($hierarchies, true);
              @endphp
              @foreach($hierarchies as $hierarchy)
                @if(array_key_exists('summary_title', $hierarchy))
                  &Sc; {{ $hierarchy['summary_title'] ?? ''}}
                  @php
                  $placeName .= ', ';
                  $placeName .= $hierarchy['summary_title'] ?? '';
                  @endphp
                @endif
              @endforeach
            @endforeach
          @endif
        </li>
        @php
        $geo = new \App\LookupPlace();
        $geo->setPlace($placeName);
        $gd = $geo->lookup();
        if(!$gd->isEmpty()){
          $geodata = $gd->first()->getCoordinates();
          $lat = $geodata->getLatitude();
          $lon = $geodata->getLongitude();
          $coord[] = array('lat' => $lat, 'lng' => $lon);
        }
        @endphp

      @endforeach
    </ul>
    @if(!empty($coord))
      @section('map')
        @map([
          'lat' => $coord[0]['lat'],
          'lng' => $coord[0]['lng'],
          'zoom' => 6,
          'markers' => [
            ['title' => 'Place associated',
            'lat' => $coord[0]['lat'],
            'lng' => $coord[0]['lng'],
            'popup' => 'Place associated'],
          ]
        ])
      @endsection
    @endif
  @endif
  @if(array_key_exists('collection', $record['_source']['lifecycle']))
    @if(array_key_exists('places', $record['_source']['lifecycle']['collection'][0]))
      <h3 class="lead collection">
        Find spot
      </h3>
      <ul class="entities">
        @foreach($record['_source']['lifecycle']['collection'][0]['places'] as $place)
          <li>
            {{ preg_replace('@\x{FFFD}@u', 'î', $place['summary_title']) }}
            @php
            $geo = new \App\LookupPlace();
            $geo->setPlace($place['summary_title']);
            $gd = $geo->lookup();
            if(!$gd->isEmpty()){
              $geodata = $geo->lookup()->first()->getCoordinates();
              $lat = $geodata->getLatitude();
              $lon = $geodata->getLongitude();
            }
            @endphp

            @isset($lat)
              @section('map')
                @map([
                  'lat' => $lat,
                  'lng' => $lon,
                  'zoom' => 6,
                  'markers' => [
                    ['title' => 'Place of origin',
                    'lat' => $lat,
                    'lng' => $lon,
                    'popup' => 'Place of origin'],
                  ]
                ])
              @endsection
            @endisset
            @if(array_key_exists('hierarchies', $place))
              @foreach ($place['hierarchies'] as $hierarchies)
                @php
                $hierarchies = array_reverse($hierarchies, true);
                @endphp
                @foreach ($hierarchies as $hierarchy)
                  @if(array_key_exists('summary_title', $hierarchy))
                    &Sc; {{ $hierarchy['summary_title'] ?? ''}}
                  @endif
                @endforeach
              @endforeach
            @endif
          </li>
        @endforeach
      </ul>
    @endif
  @endif
@endif
@endif
