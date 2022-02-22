@if(array_key_exists('content',$record['_source']))

    @if(array_key_exists('agents', $record['_source']['content']))
        <h3>Agents depicted</h3>
        <ul>
            @foreach($record['_source']['content']['agents'] as $agent)
                <li>
                    <a href="{{ URL::to(env('COLLECTION_URL'))}}/id/agent/{{ $agent['admin']['id']}}">{{ ucfirst($agent['summary_title'])}}</a>
                </li>
            @endforeach
        </ul>
    @endif

    @if(array_key_exists('subjects', $record['_source']['content']))
        <h3>Subjects depicted</h3>
        <ul>
            @foreach($record['_source']['content']['subjects'] as $subject)
                <li>
                    <a href="{{ URL::to(env('COLLECTION_URL'))}}/id/terminology/{{ $subject['admin']['id']}}">{{ ucfirst($subject['summary_title'])}}</a>
                </li>
            @endforeach
        </ul>
    @endif
@endif
