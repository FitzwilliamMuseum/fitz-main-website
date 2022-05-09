@if(array_key_exists('measurements', $record['_source']))
    <h3>Measurements and weight</h3>
    <div class="alert alert-dark" role="alert">
        <p>
            At the moment, our system does not display units or type of measurements below. We will rectify
            this as soon as possible.
        </p>
    </div>
    <ul>
        @foreach($record['_source']['measurements']['dimensions'] as $dim)
            <li>{{ $dim['value'] }}</li>
        @endforeach
    </ul>
@endif
