@if(array_key_exists('legal', $record['_source']))
    <h2>Legal notes</h2>
    <p>
        {{ ucfirst($record['_source']['legal']['credit_line']) }}
    </p>
@endif
