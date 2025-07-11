<div class="container">
    <h2>Exhibition due diligence</h2>
    <div class="container shadow-sm p-3 mb-3">
        <p>Lists of objects proposed for protection under Part 6 of the Tribunals, Courts and Enforcement Act 2007
            (protection of cultural objects on loan).</p>
    </div>
    <div class="row">
        {{-- Client request to place additional card - https://studio24.zendesk.com/agent/tickets/14626 --}}
        <div class="col-md-4 mb-3">
            <div class="card" data-component="card">
                <div class="l-box l-box--no-border card__text">
                    <h3 class="card__heading">
                        <a class="card__link" href="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/immunity-from-seizure-de-heem.pdf">
                            Picturing Excess: Jan Davidsz de Heem
                        </a>
                    </h3>
                    <p class="text-info">PDF 262kB</p>
                </div>
                <div class="l-frame l-frame--3-2 card__image">
                    <img src="https://fitz-cms-images.s3.eu-west-2.amazonaws.com/deheem.jpg?key=directus-large-crop"
                         alt=""
                         loading="lazy" />
                </div>
            </div>
        </div>

        @foreach($data['data'] as $immunity)
            <div class="col-md-4 mb-3">
                <div class="card" data-component="card">
                    <div class="l-box l-box--no-border card__text">
                        <h3 class="card__heading">
                            <a class="card__link" href="{{ $immunity['immunity_from_seizure']['data']['full_url'] }}">
                                {{ $immunity['exhibition_title'] }}
                            </a>
                        </h3>
                        <p class="text-info">
                            @mime($immunity['immunity_from_seizure']['type'])
                            @humansize($immunity['immunity_from_seizure']['filesize'])
                        </p>
                    </div>
                    <div class="l-frame l-frame--3-2 card__image">
                        @if(!is_null($immunity['hero_image']))
                            <img src="{{ $immunity['hero_image']['data']['thumbnails'][13]['url'] }}"
                                 alt=""
                                 loading="lazy" />
                        @else
                            <img src="{{ env('MISSING_IMAGE_URL') }}"
                                 alt=""
                                 loading="lazy" />
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
