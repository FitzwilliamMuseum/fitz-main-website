@section('title', $label['title'])
@section('description', $label['alt_text'] . ' - True to Nature')
<div data-src="{{$label['image']['data']['url']}}" class="mt-3">
    @if(!empty($label['image']))
        <img class="img-fluid" src="{{$label['image']['data']['url']}}"
             alt="{{ $label['alt_text'] }}"
             width="{{ $label['image']['width'] }}"
             loading="lazy"/>
    @endif
    <h2 class="py-2">
        {{ $label['display_id_number'] }}: <em>{{ $label['title'] }}</em>
    </h2>
    @if(!empty($label['manifest_url']))
        <a href="{{ route('exhibition.ttn.iiif', [$label['slug']]) }}" class="btn btn-ttn my-3 p-2"><img
                src="{{ asset('/images/logos/iiif.svg') }}" alt="IIIF icon - view image" width="20px"> View
            deep zooming image</a>
    @endif
    <p>
        <a href="{{route('exhibition.ttn.artist',$label['artist']['slug'])}}">
            {{ $label['artist']['display_name'] }}
        </a>
        <br/>
        {{ $label['artist']['place_of_birth']}} {{$label['artist']['year_of_birth']}}
        - {{$label['artist']['year_of_death']}} {{ $label['artist']['place_of_death']}}
    </p>

    <p>
        @if(!empty($label['accession_number'] ))
            {{ $label['accession_number'] }}:
        @endif
        {{ $label['institution'] }}<br/>
        Rights held by: {{ $label['credit_line'] }}
    </p>
    @if(!empty($label['artist']['biography']))
        @markdown($label['artist']['biography'])
    @endif
    @if($label['artist']['biography_author'])
        <p>
            Text written and researched by {{ $label['artist']['biography_author'] }}
            @if($label['artist']['biography_author'] === 'Amy Marquis')
                Fitzwilliam Museum, University of Cambridge.
            @else
                National Gallery of Art, Washington DC.
            @endif
        </p>
    @endif
    <p>
        {{ $label['media'] ?? 'No media recorded'}}<br/>
        {{ $label['dimensions'] ?? 'No dimensions recorded'}}
    </p>
    @if(!empty($label['earliest_year_of_production']))
        <p>
            Created:
            @if(!empty($label['earliest_year_qualifier']))
                {{$label['earliest_year_qualifier']}}
            @endif

            {{ $label['earliest_year_of_production']}}
            @if(!empty($label['latest_year_of_production']))
                - {{$label['latest_year_of_production']}}
            @endif

        </p>
    @endif
    @if(isset($label['theme']))
        <h3 class="text-info">Section: {{ $label['theme']['theme_name'] }}</h3>
        <p>This can be found in {{$label['gallery']['gallery_name']}}</p>
    @endif
</div>
@if(!empty($label['lat']))
@section('map')
    <div class="container p-3">
        @map(
        [
            'lat' => $label['lat'],
            'lng' => $label['lng'],
            'zoom' => 12,
            'minZoom' => 6,
            'maxZoom' => 18,
            'markers' => [
                    [
                        'title' => 'Place depicted',
                        'lat' => $label['lat'],
                        'lng' => $label['lng'],
                        'popup' => 'Place depicted',
                    ],
                ],
            ]
        )
    </div>
@endsection
@endif

