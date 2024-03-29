@if(!empty($adlib))
    @section('exhibition-objects')
        <div class="container py-3">
            <h3>Selected objects</h3>
            <div class="row">
                @foreach($adlib as $record)
                    @php
                        $pris = Arr::pluck($record['_source']['identifier'],'priref');
                        $pris = array_filter($pris);
                        $pris= Arr::flatten($pris)
                    @endphp
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="results_image">
                                @if(array_key_exists('multimedia', $record['_source']))
                                    <a href="{{ env('COLLECTION_URL')}}/id/object/{{ $pris[0] }}"><img
                                            class="results_image__thumbnail"
                                            src="{{ env('COLLECTION_URL')}}/imagestore/{{ $record['_source']['multimedia'][0]['processed']['preview']['location'] }}"
                                            loading="lazy"
                                            alt="An image of {{ ucfirst($record['_source']['summary_title']) }}"
                                        /></a>
                                @else
                                    <a href="{{ env('COLLECTION_URL')}}/id/object/{{ $pris[0] }}"><img
                                            class="results_image__thumbnail"
                                            src="https://content.fitz.ms/fitz-website/assets/no-image-available.png?key=directus-medium-crop"
                                            alt="A stand in image for {{ ucfirst($record['_source']['summary_title']) }}}"/></a>
                                @endif
                            </div>
                            <div class="card-body ">

                                <div class="contents-label mb-3">
                                    <h3>
                                        <a href="{{ env('COLLECTION_URL')}}/id/object/{{ $pris[0] }}"
                                           class="stretched-link">{{ ucfirst($record['_source']['summary_title']) }}</a>
                                    </h3>
                                    <p>
                                        @if(array_key_exists('department', $record['_source']))
                                            {{ $record['_source']['identifier'][0]['accession_number'] }}<br/>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
@endif
