@section('title', $label['title'])

<div data-src="{{$label['image']['data']['url']}}">
    @if(!empty($label['image']))
        <img class="img-fluid" src="{{$label['image']['data']['url']}}"
             alt="{{ $label['alt_text'] }}"
             width="{{ $label['image']['width'] }}"
             loading="lazy"/>
    @endif
    <h2 class="py-2">
        {{ $label['display_id_number'] }}: <em>{{ $label['title'] }}</em>
    </h2>


    <p>
        {{ $label['artist']['display_name'] }}<br/>
        {{ $label['artist']['place_of_birth']}} {{$label['artist']['year_of_birth']}}
        - {{$label['artist']['year_of_death']}} {{ $label['artist']['place_of_death']}}
    </p>
    <p>
        @if(!empty($label['accession_number'] ))
            {{ $label['accession_number'] }}:
        @endif
        {{ $label['institution'] }}<br/>
        {{ $label['credit_line'] }}
    </p>
    @if(!empty($label['artist']['biography']))
        @markdown($label['artist']['biography'])
    @endif
    <p>
        {{ $label['media'] }}<br/>
        {{ $label['dimensions'] }}
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

