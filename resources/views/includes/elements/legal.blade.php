@if(array_key_exists('legal', $record['_source']))
<h4>Legal notes</h4>
<p>{{ ucfirst($record['_source']['legal']['credit_line']) }} </p>
@endif
