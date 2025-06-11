@if(!empty($adlib))
    @section('exhibition-objects')
        <div class="container py-3">
            <h2>Selected objects</h2>
            <div class="row">
                @foreach($adlib as $record)
                    @php
                        $pris = Arr::pluck($record['_source']['identifier'],'priref');
                        $pris = array_filter($pris);
                        $pris = Arr::flatten($pris)
                    @endphp
                    <div class="col-md-4 mb-3">
                        <div class="card" data-component="card">
                            <div class="l-box l-box--no-border card__text">
                                <h3 class="card__heading">
                                    <a class="card__link" href="{{ env('COLLECTION_URL') }}/id/object/{{ $pris[0] }}">
                                        {{ ucfirst($record['_source']['summary_title']) }}
                                    </a>
                                </h3>
                                <p class="text-info">
                                    @if(array_key_exists('department', $record['_source']))
                                        {{ $record['_source']['identifier'][0]['accession_number'] }}
                                    @endif
                                </p>
                            </div>
                            <div class="l-frame l-frame--3-2 card__image">
                                @if(array_key_exists('multimedia', $record['_source']))
                                    <img src="{{ env('COLLECTION_URL') }}/imagestore/{{ $record['_source']['multimedia'][0]['processed']['preview']['location'] }}"
                                         alt=""
                                         loading="lazy" />
                                @else
                                    <img src="https://content.fitz.ms/fitz-website/assets/no-image-available.png?key=directus-medium-crop"
                                         alt=""
                                         loading="lazy" />
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
@endif
