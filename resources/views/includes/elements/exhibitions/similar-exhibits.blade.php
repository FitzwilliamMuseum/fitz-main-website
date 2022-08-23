@if(!empty($records))
    @section('mlt')
        <div class="container">
            <h3>Similar exhibitions from our archives</h3>
            <div class="row">
                @foreach($records as $record)
                    <x-solr-card :result="$record"></x-solr-card>
                @endforeach
            </div>
        </div>
    @endsection
@endif
