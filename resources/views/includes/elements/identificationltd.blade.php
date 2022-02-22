@foreach($record['_source']['identifier'] as $id)
    @if($id['type'] === 'priref')
        <br/>
        Collection record: <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $id['value']}}">{{ $id['value']}}</a>
    @endif
@endforeach
