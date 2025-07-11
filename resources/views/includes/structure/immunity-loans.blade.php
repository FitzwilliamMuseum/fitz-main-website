<div class="container">
    <h2>Incoming loan due diligence</h2>
    <div class="container shadow-sm p-3 mb-3">
        <p>Lists of objects proposed for protection under Part 6 of the Tribunals, Courts and Enforcement Act 2007
            (protection of cultural objects on loan).</p>
    </div>
    <div class="row">
        @foreach($data['data'] as $immunity)
            <div class="col-md-4 mb-3">
                <div class="card" data-component="card">
                    <div class="l-box l-box--no-border card__text">
                        <h3 class="card__heading">
                            <a class="card__link" href="{{ $immunity['immunity_from_seizure']['data']['full_url'] }}">
                                {{ $immunity['title'] }}
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
