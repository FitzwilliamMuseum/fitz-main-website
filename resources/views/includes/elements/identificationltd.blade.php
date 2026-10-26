@foreach($record['_source']['identifier'] as $id)
    @if($id['type'] === 'priref')
        <br/>
        Collection record: <a href="{{ config('fitz.collections.url') }}/id/object/{{ $id['value']}}">{{ $id['value']}}</a>
    @endif
@endforeach
