@if(array_key_exists('legal', $record['_source']))
<h3>Legal notes</h3>
<p>{{ ucfirst($record['_source']['legal']['credit_line']) }} </p>
@endif
