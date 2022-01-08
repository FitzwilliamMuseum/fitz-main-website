@section('title', ucfirst($record['_source']['summary_title']))
@if(array_key_exists('description', $record['_source']))
@foreach($record['_source']['description'] as $description)
  <p>{{ ucfirst($description['value']) }} </p>
@endforeach
@endif
@if(array_key_exists('note', $record['_source']))
  <p>{{ ucfirst($record['_source']['note'][0]['value']) }} </p>
@endif
