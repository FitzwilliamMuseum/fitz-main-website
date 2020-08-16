<h4>Identification numbers</h4>
<ul>
  @foreach($record['_source']['identifier'] as $id)
  @if(array_key_exists('type', $id))
    @if($id['type'] === 'uri')
    <li><a href="{{ $id['value']}}">Stable URI</a></li>
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
  <li>Created: {{ \Carbon\Carbon::createFromTimestamp($record['_source']['admin']['created']/ 1000)->format('d-m-Y') }}</li>
  <li>Updated: {{ \Carbon\Carbon::createFromTimestamp($record['_source']['admin']['modified']/ 1000)->format('d-m-Y') }}</li>
  <li>Last processed: {{ \Carbon\Carbon::createFromTimestamp($record['_source']['admin']['processed']/ 1000)->format('d-m-Y') }}</li>
  <li>Data source: {{ $record['_source']['admin']['source'] }}</li>
</ul>
