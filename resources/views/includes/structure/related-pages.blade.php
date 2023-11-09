{{--
Iterates over $records, rendering a card for each $record where 'url' is not 'visiting-guidelines'.
This excludes a specific card from the "Related to this page" section.
--}}
@if(!empty($records))
@section('associated_pages')
<div class="container">
    <h3>Related to this page</h3>
    <div class="row">
        @foreach($records as $record)
            @if (!isset($record['url']) || $record['url'] !== 'visiting-guidelines')
                <x-solr-card :result="$record" />
            @endif
        @endforeach
    </div>
</div>
@endsection
@endif
