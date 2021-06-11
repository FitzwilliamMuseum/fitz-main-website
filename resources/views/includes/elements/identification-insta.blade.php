<h4 class="lead">Identification number</h4>
<ul>
  @foreach($record['_source']['identifier'] as $id)
  @if(array_key_exists('primary', $id))
    <li>{{ $id['value']}}</li>
  @endif
  @if(array_key_exists('priref', $id))
    <li><a href="{{ env('COLLECTION_URL') }}/id/object/{{ $id['priref']}}">Full record</a></li>
  @endif
  @endforeach
</ul>
