<h4>Identification numbers</h4>
<ul>
  @foreach($record['_source']['identifier'] as $id)
    @if(array_key_exists('type', $id))
      @if($id['type'] === 'uri')
        <li class="sr-only"><a href="{{ $id['value']}}">Stable URI</a></li>
      @elseif($id['type'] === 'priref')
        <li>Primary reference Number: <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $id['value']}}">{{ $id['value']}}</a></li>
      @elseif($id['type'] === 'Online 3D model')
        <li class="sr-only"><a href="https://sketchfab.com/3d-models/{{ $id['value']}}">Sketchfab model</a></li>
      @else
        <li>{{ ucfirst($id['type']) }}: {{ $id['value']}}</li>
      @endif
    @else
      <li>{{ $id['value']}}</li>
    @endif
  @endforeach
</ul>
<h4>Audit data</h4>
<ul>
  <li>Created: {{ \Carbon\Carbon::createFromTimestamp($record['_source']['admin']['created']/ 1000)->format('l j F Y') }}</li>
  <li>Updated: {{ \Carbon\Carbon::createFromTimestamp($record['_source']['admin']['modified']/ 1000)->format('l j F Y') }}</li>
  <li>Last processed: {{ \Carbon\Carbon::createFromTimestamp($record['_source']['admin']['processed']/ 1000)->format('l j F Y') }}</li>
  <li>Data source: {{ ucfirst($record['_source']['admin']['source']) }}</li>
</ul>
