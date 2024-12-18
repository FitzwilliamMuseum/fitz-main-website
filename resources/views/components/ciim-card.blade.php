@php
    $pris = Arr::pluck($record['_source']['identifier'],'priref');
    $pris = array_filter($pris);
    $pris= Arr::flatten($pris)
@endphp

<div class="col-md-4 mb-3" data-component="card">
    <div class="card card-fitz h-100">
        @if(array_key_exists('multimedia', $record['_source']))
            <img class="results_image__thumbnail"
                    src="{{ env('COLLECTION_URL') }}/imagestore/{{ $record['_source']['multimedia'][0]['processed']['preview']['location'] }}"
                    loading="lazy" alt="An image of {{ ucfirst($record['_source']['summary_title']) }}"
            />
        @else
            <img class="results_image__thumbnail"
                    src="https://content.fitz.ms/fitz-website/assets/no-image-available.png?key=directus-medium-crop"
                    alt="A stand in image for {{ ucfirst($record['_source']['summary_title']) }}}"
            />
        @endif
        <div class="card-body ">
            <div class="contents-label mb-3">
                @if(array_key_exists('title',$record['_source'] ))
                    <h2>
                        <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}" class="stretched-link">
                            {{ ucfirst($record['_source']['title'][0]['value']) }}
                        </a>
                    </h2>
                @else
                    <h3>
                        <a href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}" class="stretched-link">
                            {{ ucfirst($record['_source']['summary_title']) }}
                        </a>
                    </h3>
                @endif
                <p class="text-info">
                    {{ $record['_source']['identifier'][0]['accession_number'] }}
                </p>
            </div>
        </div>
    </div>
</div>
