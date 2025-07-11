@if(array_key_exists('institutions', $record['_source']))
    <h2>Associated institutions</h2>
    <ul>
        @foreach($record['_source']['institutions'] as $institution)
            <li>
                <a href="{{ URL::to(env('COLLECTION_URL')) }}/id/agent/{{ $institution['admin']['id']}}">
                    {{ $institution['summary_title'] }}
                </a>
            </li>
        @endforeach
    </ul>
@endif
