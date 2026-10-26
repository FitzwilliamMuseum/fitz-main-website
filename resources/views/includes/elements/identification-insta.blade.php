<h2>Identification number</h2>
<ul>
    @foreach($record['_source']['identifier'] as $id)
        @if(array_key_exists('primary', $id))
            <li>
                {{ $id['value']}}
            </li>
        @endif
        @if(array_key_exists('priref', $id))
            <li>
                <a href="{{ config('fitz.collections.url') }}/id/object/{{ $id['priref']}}">
                    Full record
                </a>
            </li>
        @endif
    @endforeach
</ul>
