@if(array_key_exists('materials', $record['_source']))
    <h3>Materials used in production</h3>
    <ul>
        @foreach($record['_source']['materials'] as $material)
            @foreach($material as $mat)
                @if(array_key_exists('admin', $mat))
                    <li>
                        <a href="{{ URL::to(env('COLLECTION_URL'))}}/id/terminology/{{ $mat['admin']['id']}}">{{ ucfirst($mat['summary_title'])}}</a>
                    </li>
                @endif
            @endforeach
        @endforeach
    </ul>
@endif
