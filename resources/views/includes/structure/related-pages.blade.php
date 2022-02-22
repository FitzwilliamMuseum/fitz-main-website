@if(!empty($records))
    @section('associated_pages')
        <div class="container">
            <h3>Related to this page</h3>
            <div class="row">
                @foreach($records as $record)
                    <x-solr-card :result="$record"/>
                @endforeach
            </div>
        </div>
    @endsection
@endif
