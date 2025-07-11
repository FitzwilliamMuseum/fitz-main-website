@if(array_key_exists('techniques', $record['_source']))
    <h2>Techniques used in production</h2>
    <ul>
        @foreach($record['_source']['techniques'] as $techniques)
            @if(array_key_exists('reference', $techniques))
                <li>
                    <a href="{{ env('COLLECTION_URL') }}/id/terminology/{{ $techniques['reference']['admin']['id']}}">{{ ucfirst($techniques['reference']['summary_title'])}}</a>
                    @if(array_key_exists('description', $techniques))
                        : {{ ucfirst($techniques['description'][0]['value'])}}@endif
                </li>
            @endif
        @endforeach
    </ul>
@endif
