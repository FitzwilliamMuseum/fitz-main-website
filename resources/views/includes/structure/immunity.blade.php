<div class="container">
    <h3>Exhibition due diligence</h3>
    <div class="container shadow-sm p-3 mb-3">
        <p>Lists of objects proposed for protection under Part 6 of the Tribunals, Courts and Enforcement Act 2007
            (protection of cultural objects on loan).</p>
    </div>
    <div class="row">
        @foreach($data['data'] as $immunity)
            <div class="col-md-4 mb-3">
                <div class="card  h-100">
                    @if(!is_null($immunity['hero_image']))
                        <a href="{{ $immunity['immunity_from_seizure']['data']['full_url']}}"><img class="img-fluid"
                                                                                                   src="{{ $immunity['hero_image']['data']['thumbnails'][4]['url']}}"
                                                                                                   loading="lazy"
                                                                                                   alt="{{ $immunity['hero_image_alt_text'] }}"
                                                                                                   width="{{ $immunity['hero_image']['data']['thumbnails'][4]['width'] }}"
                                                                                                   height="{{ $immunity['hero_image']['data']['thumbnails'][4]['height'] }}"
                            /></a>
                    @endif
                    <div class="card-body h-100">
                        <div class="contents-label mb-3">
                            <h3>
                                <a class="stretched-link"
                                   href="{{ $immunity['immunity_from_seizure']['data']['full_url'] }}">{{ $immunity['exhibition_title']}}</a>
                            </h3>
                            <p class="text-info">@mime($immunity['immunity_from_seizure']['type'])
                                @humansize($immunity['immunity_from_seizure']['filesize'])</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- Client request to place additional card - https://studio24.zendesk.com/agent/tickets/14626 --}}
        <div class="col-md-4 mb-3">
            <div class="card  h-100">
                <a href="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/immunity-from-seizure-de-heem.pdf"><img class="img-fluid"
                                src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/deheem.jpg?key=directus-large-crop"
                                loading="lazy"
                                alt="Picturing Excess: Jan Davidsz de Heem"
                                width="800"
                                height="600"
                    /></a>
                <div class="card-body h-100">
                    <div class="contents-label mb-3">
                        <h3>
                            <a class="stretched-link" href="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/immunity-from-seizure-de-heem.pdf">Picturing Excess: Jan Davidsz de Heem</a>
                        </h3>
                        <p class="text-info">PDF 262kB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
