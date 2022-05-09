@foreach($record['_source']['identifier'] as $id)
    @if(array_key_exists('type', $id))
        @if($id['type'] === 'priref')
            <a class="btn btn-dark d-block" href="{{ env('COLLECTION_URL') }}/id/object/{{ $id['value']}}">
                Read more about this record
            </a>
        @endif
    @endif
@endforeach

