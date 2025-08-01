@if(array_key_exists('multimedia', $record['_source']))
    <div class="col-md-12 mb-3">
        <div class="shadow-sm p-3 mx-auto mb-3 mt-3">
            <div>
                @if(array_key_exists('multimedia', $record['_source']))
                    <a href="{{ env('COLLECTION_URL') }}/id/image/{{ $record['_source']['multimedia'][0]['admin']['id']}}">
                        <img class="img-fluid mx-auto d-block"
                             src="{{ env('CONTENT_STORE') }}{{ $record['_source']['multimedia'][0]['processed']['original']['location'] }}"
                             loading="lazy"
                             alt="An image of {{ ucfirst($record['_source']['summary_title']) }}"/>
                    </a>
                @endif
            </div>
        </div>
        @endif

        @if(array_key_exists('multimedia', $record['_source']))
            @if(!empty(array_slice($record['_source']['multimedia'],1)))
                <h2>Alternative views</h2>
                <div class="row">
                    @foreach(array_slice($record['_source']['multimedia'],1) as $media)
                        <div class="col-md-4 mt-3">
                            <div class="card card-body h-100">
                                <a href="{{ env('COLLECTION_URL') }}/id/image/{{ $media['admin']['id']}}">
                                    <img class="img-fluid mx-auto d-block"
                                         src="{{ env('CONTENT_STORE') }}{{ $media['processed']['preview']['location'] }}"
                                         loading="lazy"
                                         alt="An image of {{ ucfirst($record['_source']['summary_title']) }}"/>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
    </div>
@endif
