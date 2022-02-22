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
    </div>
</div>
